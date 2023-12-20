<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::latest()
            ->select(
                'id',
                'username as name',
                'role as work',
                'invoiceNumber',
                'phone_number',
                'email',
                DB::raw('CASE WHEN active = 1 THEN "active" ELSE "inactive" END as status')
            );

        if ($request->filled('keyword')) { 
            $keyword = $request->keyword;

            $users = $users->where(function ($query) use ($keyword) { 
                $query->where('username', 'like', "%$keyword%")
                    ->orWhere('email', 'like', "%$keyword%")
                    ->orWhere('phone_number', 'like', "%$keyword%")
                    ->orWhere('invoiceNumber', 'like', "%$keyword%")
                    ->orWhere('role', 'like', "%$keyword%")
                    ->orWhere(function ($query) use ($keyword) {
                        $statusKeyword = in_array(strtolower($keyword), ['active', 'Active']) ? 1 : (in_array(strtolower($keyword), ['inactive', 'Inactive']) ? 0 : null);
                        if ($statusKeyword !== null) {
                            $query->where('active', $statusKeyword);
                        }
                    });
            });
        }

        $users = $users->paginate(10);

        return view('admin/managementUser', ['users' => $users]); 
    }

    public function create()
    {
        return view('admin/addNewUser'); 
    }

    public function store(Request $request)
    {
        $username = User::where('username', $request->username)->first();

        if ($username) return redirect('/managementUser')->with('error', 'Username already exists!');

        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'role' => 'required',
            'phone_number' => 'required',
            'invoiceNumber' => 'required',
        ]); 

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password), 
            'email' => $request->email,
            'role' => $request->role,
            'phone_number' => $request->phoneNumber,
            'invoiceNumber' => $request->invoiceNumber,
            'active' => 0,
        ]); 

        return redirect('/managementUser')->with('success', 'New user has been added!'); 
    }

    public function update(Request $request, $id)
    {
        $id = User::Auth()->id;
        $user = User::find($id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone_number = $request->phoneNumber;
        $user->invoiceNumber = $request->invoiceNumber;
        $user->active = $request->status == 'active' ? 1 : 0;
    
        return redirect('/managementUser')->with('success', 'User has been updated!'); 
    }

    public function destroy($id)
    {
        $user = User::find($id); 
        $user->delete(); 

        return redirect('/managementUser')->with('success', 'User has been deleted!'); 
    }
}
