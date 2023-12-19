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
        $users = User::latest() // Query untuk mengambil data user
            ->select(
                'id',
                'username as name',
                'role as work',
                'invoiceNumber',
                'phoneNumber',
                'email',
                DB::raw('CASE WHEN active = 1 THEN "active" ELSE "inactive" END as status')
            );

        if ($request->filled('keyword')) { // Jika terdapat keyword pencarian pada request
            $keyword = $request->keyword;

            $users = $users->where(function ($query) use ($keyword) { // Query untuk melakukan filter data berdasarkan keyword
                $query->where('username', 'like', "%$keyword%")
                    ->orWhere('email', 'like', "%$keyword%")
                    ->orWhere('phoneNumber', 'like', "%$keyword%")
                    ->orWhere('invoiceNumber', 'like', "%$keyword%")
                    ->orWhere('role', 'like', "%$keyword%")
                    ->orWhere(function ($query) use ($keyword) {
                        // Format keyword yang sesuai dengan kondisi status
                        $statusKeyword = in_array(strtolower($keyword), ['active', 'Active']) ? 1 : (in_array(strtolower($keyword), ['inactive', 'Inactive']) ? 0 : null);
                        if ($statusKeyword !== null) {
                            $query->where('active', $statusKeyword);
                        }
                    });
            });
        }

        $users = $users->paginate(10); // Pagination data

        return view('admin/managementUser', ['users' => $users]); // Mengirim data user ke view
    }

    public function create()
    {
        return view('admin/addNewUser'); // Menampilkan halaman tambah user
    }

    public function store(Request $request)
    {
        // check if username already exists
        $username = User::where('username', $request->username)->first();

        if ($username) return redirect('/managementUser')->with('error', 'Username already exists!'); // Redirect ke halaman management user

        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'role' => 'required',
            'phoneNumber' => 'required',
            'invoiceNumber' => 'required',
        ]); // Validasi data

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password), // Enkripsi password
            'email' => $request->email,
            'role' => $request->role,
            'phoneNumber' => $request->phoneNumber,
            'invoiceNumber' => $request->invoiceNumber,
            'active' => 0,
        ]); // Query untuk menambahkan data user

        return redirect('/managementUser')->with('success', 'New user has been added!'); // Redirect ke halaman management user
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phoneNumber = $request->phoneNumber;
        $user->invoiceNumber = $request->invoiceNumber;
        $user->active = $request->status == 'active' ? 1 : 0; // Jika status active maka active = 1, jika inactive maka active = 0
        $user->save(); // Query untuk mengupdate data user

        return redirect('/managementUser')->with('success', 'User has been updated!'); // Redirect ke halaman management user
    }

    public function destroy($id)
    {
        $user = User::find($id); // Query untuk mengambil data user
        $user->delete(); // Query untuk menghapus data user

        return redirect('/managementUser')->with('success', 'User has been deleted!'); // Redirect ke halaman management user
    }
}
