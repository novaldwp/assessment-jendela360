<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (auth()->check())
        {
            return redirect()->route('home');
        }

        return view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        $params['email']    = $request->email;
        $params['password'] = $request->password;

        if(auth()->attempt($params))
        {
            return redirect()->route('home');
        }
        else {
            return redirect()->back()->withInput()->withErrors(
                ['email' => "Email atau Password salah"]
            );
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('auth.login');
    }
}
