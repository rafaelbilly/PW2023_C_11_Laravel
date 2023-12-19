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
            return redirect('homepage');
        } else {
            return view('login');
        }
    }

    public function actionLogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();

            if ($user->active) {
                return $this->redirectToRole($user->role);
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

    private function redirectToRole($role)
    {
        if ($role == 0) {
            return redirect('homepage');
        } elseif ($role == 1) {
            return redirect('DashboardAdmin');
        } else {
            return redirect('homepage');
        }
    }

}
