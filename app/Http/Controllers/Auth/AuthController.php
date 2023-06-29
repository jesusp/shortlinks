<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {

    public function login(Request $request)
    {
        
        session()->forget('messages');
        if ($request->isMethod('POST')) {
            $email = $request->get('email');
            $pass = $request->get('password');
            $next = $request->get('next');
            $remember = true;

            $this->validate($request, [
                'email' => 'required|max:255|email',
                'password' => 'required',
            ]);

            $user = \App\Models\User::where('email', $email)->first();

            if (!$user) {
                session()->flash('messages', 'No encontramos registros de este usuario');
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
            session()->flash('messages', 'Contraseña incorrecta');
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
        return redirect()->route("admin.login");
    }

    public function register(Request $request){
        
        if ($request->isMethod('POST')) {
            $user = new User();
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required | email | unique:App\Models\User,email',
                'password' => 'required|min:6',
                
            ]);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route("admin.login");
        }
        
        return view('admin.register');
    }

    public function passwordRecovery(){
        return view('admin.email_reset_password');
    }
    
    public function passwordRecover(Request $request)
    {

        $email = $request->email;
        
        if ($request->isMethod('POST')) {
            if ( !$email ) {
                session()->flash('messages', 'Es necesario especificar la cuenta de correo.');
                return redirect()->back();
                
            }
    
            $user = \App\Models\User::where('email', $email)->first();
            if (! $user ) {
                session()->flash('messages', 'No existe ningún usuario con el correo'. $email);
                return redirect()->back();
               
            }
    
            $user->setVerificationCode();
        }
       
        return view('admin.reset_password', [
            "email" => $email,
        ]);
        /*try {
            
            $user->sendVerificationCode();

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Hubo un error al enviar el correo.',
                'exception' => $e->getMessage()
            ]);
        }*/

        /*return response()->json([
            'status' => 'success',
            'message' => 'El código de verificación ha sido enviado a ' . $email,
        ]);*/

        

    }

    public function passwordVerificationCode(Request $request)
    {
       
        $email = $request->email;
        $code =  $request->code;
        $newPassword =  $request->password;
        session()->forget('code');
        session()->forget('messages');

        $rules = [
            'code' => 'required',
            'password' => 'required|min:6',
            'passwordConfirm' => 'required|same:password'
        ];
        $customMessages = [
            'code.required' => 'Es necesario especificar código de verificación',
        ];
        $request->validate($rules, $customMessages);

        if (! $email ) {
            session()->flash('messages', 'Es necesario especificar la cuenta de correo');
            return view('admin.email_reset_password');
        }

        $user = User::where('email', $email)->first();

        if (! $user ) {
            session()->flash('messages', 'No existe ningún usuario con el correo'. $email);
            return view('admin.email_reset_password');
            
        }

        if ($user->verification_code != $code) {
            session()->flash('code', 'Código de verificación incorrecto');
            return view('admin.reset_password', [
                "email" => $email,
            ]);
            
        }

        if ($newPassword) {
            $user->password = bcrypt($newPassword);
            //$user->passwordChangedEmail();
            $user->save();
            session()->flash('success', 'Su contraseña ha sido actualizada.');
            return redirect()->route("admin.login");
              
        }
    }
}