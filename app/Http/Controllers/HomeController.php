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
        $review = Review::latest()->get(); // mengambil semua data dari tabel reviews

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
            'phone' => auth()->user()->phoneNumber,
            'image' => auth()->user()->image // tambahkan field image jika dibutuhkan
        ];

        return view('user.userProfile', [
            'userProfile' => $userProfile
        ]);
    }


    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
            'phoneNumber' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // validasi untuk file gambar
        ]);

        $user = User::findOrFail(auth()->id());

        $validated['image'] = $user->image;
            $fileName = time() . '.' . $request->image->extension();
            $validated['image'] = $fileName;
        
            $request->image->storeAs('uploads/images', $fileName, 'public');
        
            $oldPath = public_path('uploads/images/' . $user->image);
            if (file_exists($oldPath) && is_file($oldPath) && $user->image != 'image.png') {
                unlink($oldPath);
            }
        
        

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        } else {
            $validated['password'] = $user->password;
        }

        $user->update($validated);

        return redirect(route('userProfile'))->with('success', 'User profile updated successfully');
}
}