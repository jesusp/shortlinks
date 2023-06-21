<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AuthController extends Controller {

    public function login(Request $request)
    {

        if ($request->isMethod('POST')) {
            $email = $request->get('email');
            $pass = $request->get('password');
            $next = $request->get('next');
            $remember = true;

            $this->validate($request, [
                'email' => 'required|max:255',
                'password' => 'required',
            ]);

            $user = \App\Models\User::where('email', $email)->first();

            if (!$user) {
                session()->flash('messages', 'error|No encontramos registros de este usuario');
                return redirect()->back();
            }

            if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $pass], $remember)) {

                $user->last_login = date('Y-m-d H:i:s');
                $user->save();
                if ($next) {
                    return redirect($next);
                }

                return redirect()->route("admin.home");
            }
            session()->flash('messages', 'error|Contraseña incorrecta');
        }

        if (Auth::guard('admin')->check()) {
            return redirect()->route("admin.home");
        }

        return view('admin.login');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        session()->flush();
        return redirect('/');
    }
}