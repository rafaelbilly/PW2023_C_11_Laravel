<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use App\Mail\MailSend;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function actionRegister(Request $request)
    {
        $str = Str::random(100);
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->input('password')),
            'verify_key' => $str,
        ]);

        $details = [
            'username' => $request->username,
            'datetime' => now(),
            'url' => request()->getHttpHost() . '/register/verify/' . $str
        ];

        Mail::to($request->email)->send(new MailSend($details));

        Session::flash('message', 'Link verifikasi telah dikirim ke email anda. Silahkan cek email anda untuk mengaktifkan akun.');
        return redirect('register');
    }

    public function verify($verify_key){
        $keyCheck = User::select('verify_key')
            ->where('verify_key', $verify_key)
            ->exists();

        if ($keyCheck) {
            $user = User::where('verify_key', $verify_key)
                ->update([
                    'active' => 1,
                    'email_verified_at' => now(),
                ]);

            return "Verifikasi berhasil. Akun anda sudah aktif.";
        } else {
            return "Keys tidak valid.";
        }
    }
}
