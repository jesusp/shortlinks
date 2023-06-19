<?php
namespace App\Library;

use Illuminate\Support\Str;
use App\Models\Shortlink;
use App\Models\ShortlinkSession;
/**
* Analytics wrapper class
*/
class Helpers
{

    public static function validateLink($url) {

        /*
        if(!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = 'http://'.$url;
        }
        */
        $url = Helpers::getValidLink($url);

        $hasExtension = !!pathinfo(parse_url($url, PHP_URL_HOST), PATHINFO_EXTENSION);
        $isValid = filter_var($url, FILTER_VALIDATE_URL, \FILTER_FLAG_HOST_REQUIRED);
        return $isValid && $hasExtension;
    }

    public static function generateShortLink($url) {

        if(Helpers::validateLink($url)) {
            $shortLink = new Shortlink();
            $shortLink->original_url = $url;
            $shortLink->slug = Helpers::generateRandomSlug();
            if(ShortLink::where('slug', $shortLink->slug)->first()) {
                return Helpers::generateShortLink($url);
            }
            //HERE NEED USER ID
            if($shortLink->save()) {
                return route('home').'/'.$shortLink->slug;
            }
        }
        return $url; //null;
    }

    public static function generateRandom($length = 5) {
        return Str::random($length);
    }

    public static function generateRandomSlug($length = 5) {
        $slug = Helpers::generateRandom($length);
        if(ShortLink::where('slug', $slug)->first()) {
            $slug = Helpers::generateRandomSlug($length);
        }
        return $slug;
    }

    public static function getValidLink($url) {
        if(!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = 'http://'.$url;
        }

        return $url;
    }

    public static function registerVisitor($shortLink) {
        try{
            if($shortLink->id) {
                $userAgent = request()->userAgent();
                $shortLinkSession = ShortlinkSession::where('user_agent', $userAgent)->where('shortlink_id', $shortLink->id)->first();
                if(!$shortLinkSession) {
                    $shortLinkSession = new ShortlinkSession();
                }
                $shortLinkSession->shortlink_id = $shortLink->id;
                $shortLinkSession->user_agent =  $userAgent;
                $shortLinkSession->clicks += 1;
                $shortLinkSession->save();

            return true;
            }
        } catch(Exception $e) { }
        return false;
    }
}