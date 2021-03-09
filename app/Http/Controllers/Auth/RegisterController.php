<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $params['name']     = $request->name;
        $params['email']    = $request->email;
        $params['password'] = bcrypt($request->password);

        $register = User::create($params);

        if ($register)
        {
            return redirect()->back()->with("success", "Register berhasil");
        }

        return redirect()->back()->with("error", "Register gagal");
    }
}
