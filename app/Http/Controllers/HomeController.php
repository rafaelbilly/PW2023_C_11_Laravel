<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $review = Review::latest()->get(); 

        return view('user.homepage', [
            'review' => $review
        ]);
    }

    public function userProfile()
    {
        $userProfile = [
            'username' => auth()->user()->username,
            'email' => auth()->user()->email,
            'password' => auth()->user()->password,
            'phone_number' => auth()->user()->phone_number,
            'image' => auth()->user()->image,
        ];

        return view('user.userProfile', [
            'userProfile' => $userProfile
        ]);
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->all() + [
            'updated_at' => now(),
        ];

        $user = User::findOrFail(auth()->id());

        $validated['image'] = $user->image;

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $validated['image'] = $fileName;

            $request->image->move(public_path('uploads/images'), $fileName);

            $oldPath = public_path('/uploads/images/' . $user->image);
            if (file_exists($oldPath) && is_file($oldPath) && $user->image != 'image.png') {
                unlink($oldPath);
            }
        }

        $user->update($validated);

        return redirect(route('userProfile'))->with('success', 'User profile updated successfully');
    }
}
