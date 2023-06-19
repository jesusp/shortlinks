<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Library\Helpers;
use App\Models\ShortLink;
use Redirect;

class HomeController extends Controller {


    public function index(Request $request) {
        $data = [];

        //dd(route('home'),request()->getHost(), request()->getHttpHost());

        
        if ($request->isMethod('post')) {

            $data = $request->all();
            $url = $data['link'] ?? '';
            /*if(!preg_match("~^(?:f|ht)tps?://~i", $url)) {
                $url = 'http://'.$url;
            }

            $hasExtension = !!pathinfo(parse_url($url, PHP_URL_HOST), PATHINFO_EXTENSION);
            $isValid = filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED);
            if($isValid || !$hasExtension) {
                dd($url, "VALID");
            }
            */
            $data['isValid'] = Helpers::validateLink($url);

            $data['shortLink'] = Helpers::generateShortLink($url);

            //dd("VALIDATION", $url, Helpers::validateLink($url));
            //dd($data);
        }

  
        return view('web.home', $data);
    }

    public function openLink($slug) {

        $link = ShortLink::where('slug', $slug)->first();

        if($link && $link->original_url && $link->enabled && !$link->blocked) {
            //dd($link);
            Helpers::registerVisitor($link);
            $link->clicks += 1;
            $link->save();
            //dd("HELLO");
            return Redirect::to(Helpers::getValidLink($link->original_url));

        }
        return Redirect::to('/')->with('error', 'Invalid link.');;
    }

    public function counter(Request $request) {
        $data = $request->all();

        if(isset($data['u'])) {
            $urlData = explode("/", $data['u']);
            $slug = end($urlData);
            
            $shortLink = ShortLink::where('slug', $slug)->where('blocked', 0)->first();
            if($shortLink) {
                $data['link'] = Helpers::getRealUrl($slug);
                $data['shortLink'] = $shortLink;
                $data['clicks'] = $shortLink->clicks;
            }
            //dd($slug);
            //Helpers::getRealUrl();
        }
        return view('web.counter', $data);
    }

}