<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Event;
use App\Models\User; 
use Exception;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::where('id_user', Auth::id())->oldest()->paginate(5);
        return view('pemesanan.index', compact('pemesanan'));
    }

    public function create()
    {
        $user = User::findOrFail(Auth::id()); // Mendapatkan data user yang sedang login
        $events = Event::all(); // Mengambil semua event

        return view('ticket.create', compact('user', 'events'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_user' => 'required',
            'id_event' => 'required',
            'jmlOrder' => 'required',
            'tanggalPemesanan' => 'required',
            'total_biaya' => 'required',
            'status' => 'required|in:lunas,belum bayar',
        ]);

        $id_user = Auth::id();
            //Fungsi Simpan Data ke dalam Database
        Pemesanan::create([
            'id_user' => $id_user,
            'id_event' => $request->id_event,
            'jmlOrder' => $request->jmlOrder,
            'tanggalPemesanan' => $request->tanggalPemesanan,
            'total_biaya' => $request->total_biaya,
            'status' => $request->status,
        ]);
        
        try{
            return redirect()->route('pemesanan.index');
        }catch(Exception $e){
            return redirect()->route('pemesanan.index');
        }
    }

    public function destroy($id)
    {
        $pemesanan =Pemesanan::find($id);
        $pemesanan->delete();
        return redirect()->route('pemesanan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
