<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('user.dashboard');
        } else {
            return view('login');
        }
    }

    public function actionLogin(Request $request)
    {
        $data = [
            'email' => strtolower($request->input('email')),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();

            if ($user->active) {
                return redirect('user.dashboard');
            } else {
                Auth::logout();
                Session::flash('error', 'Akun Anda Belum Diverifikasi. Silahkan cek email anda.');
                return redirect('login');
            }
        } else {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('login');
        }
    }


    public function actionLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
