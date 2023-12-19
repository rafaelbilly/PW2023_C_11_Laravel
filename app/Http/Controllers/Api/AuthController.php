<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $registrationData = $request->all();

        $validate = Validator::make($registrationData, [
            'username' => 'required|max:60',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:5',
            // 'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($validate->fails()) {
            return response(['message' => $validate->errors()], 400);
        }

        $registrationData['status'] = 0;
        $registrationData['password'] = bcrypt($request->password);

        // $uploadFolder = 'users';
        // $image = $request->file('image');
        // $image_uploaded_path = $image->store($uploadFolder, 'public');
        // $registrationData['image'] = $image_uploaded_path;

        $user = User::create($registrationData);

        return response([
            'message' => 'Register Sukses',
            'user' => $user
        ], 200);
    }

    public function login(Request $request)
    {
        $loginData = $request->all();

        $validate = Validator::make($loginData, [
            'email' => 'required|email:rfc,dns',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()], 400);
        }

        if (!Auth::attempt($loginData)) {
            return response(['message' => 'Invalid Credential'], 401);
        }

        /** @var \App\Models\User $user **/
        $user = Auth::user();

        $user->update([
            'active' => 1,
            'email_verified_at' => now(),
        ]);

        $token = $user->createToken('Authentication Token')->accessToken;

        return response([
            'message' => 'Authenticated',
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
                'email' => $user->email,
                'active' => $user->active,
                'email_verified_at' => optional($user->email_verified_at)->format('Y-m-d H:i:s'),
            ],
            'token_type' => 'Bearer',
            'access_token' => $token
        ]);
    }
}