<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class EventController extends Controller
{
    public function dashboardAdmin()
    {
        $acara2Data = Event::latest()->get(); // mengambil semua data dari tabel events

        $acara2 = $acara2Data->map(function ($e) { // mengubah data yang diambil menjadi array
            return [
                'nama' => $e->nama, // mengambil nama dari tabel events
                'gambar' => asset('uploads/images/' . $e->image), // mengambil gambar dari folder uploads/images
            ];
        })->take(4)->toArray(); // mengubah data yang diambil menjadi array

        $pemesananData = Pemesanan::latest()->get(); // mengambil semua data dari tabel pemesanans

        $admin = $pemesananData->map(function ($p) { // mengubah data yang diambil menjadi array
            return [
                'invoice' => $p->invoice, // mengambil invoice dari tabel pemesanans
                'nama' => $p->user->username, // mengambil nama dari tabel pemesanans
                'price' => $p->total_biaya, // mengambil total_biaya dari tabel pemesanans
                'status' => ucfirst($p->status), // mengambil status dari tabel pemesanans
                'keterangan' => $p->status, // mengambil keterangan dari tabel pemesanans
            ];
        })->toArray(); // mengubah data yang diambil menjadi array

        $data = [
            'income' => Pemesanan::where('status', 'lunas')->sum('total_biaya'),
            'user' => User::count(),
            'booking' => Pemesanan::count(),
            'new_booking' => Pemesanan::where('status', 'belum lunas')->count(),
        ];

        return view('admin/dashboardAdmin', [
            'admin' => $admin,
            'acara2' => $acara2,
            'data' => $data
        ]);
    }

    public function index(Request $request)
    {
        $eventData = Event::latest()->get(); // mengambil semua data dari tabel events

        if ($request->filled('keyword')) { // mengecek apakah ada parameter keyword
            $eventData = Event::where('nama', 'like', "%{$request->keyword}%") // mengambil data berdasarkan nama
                ->orWhere('deskripsi', 'like', "%{$request->keyword}%") // mengambil data berdasarkan deskripsi
                ->orWhere('deskripsi2', 'like', "%{$request->keyword}%") // mengambil data berdasarkan deskripsi2
                ->latest()->get(); // mengambil semua data dari tabel events
        }

        $event = $eventData->map(function ($e) { // mengubah data yang diambil menjadi array
            return [
                'id' => $e->id, // mengambil id dari tabel events
                'gambarEvent' => asset('uploads/images/' . $e->image), // mengambil gambar dari folder uploads/images
                'judul' => $e->nama, // mengambil nama dari tabel events
                'deskripsi' => $e->deskripsi, // mengambil deskripsi dari tabel events
                'deskripsi2' => $e->deskripsi2, // mengambil deskripsi2 dari tabel events
            ];
        })->toArray(); // mengubah data yang diambil menjadi array

        return view('admin/managementEventAdmin', compact('event'));
    }

    public function store(Request $request)
    {
        $validated = $request->all() + [
            'id_user' => auth()->id(), // mengambil id user yang sedang login
            'created_at' => now(),
        ]; // mengambil semua data dari form

        if($request->hasFile('image')){
            $fileName = time() . '.' . $request->image->extension(); // membuat nama file unik
            $validated['image'] = $fileName; // menambahkan data image ke dalam array $validated

            // move file
            $request->image->move(public_path('uploads/images'), $fileName); // memindahkan file ke folder public/uploads/images
        }

        $event = Event::create($validated); // menyimpan data ke database

        return redirect('/managementEventAdmin')->with('success', 'Event berhasil ditambahkan'); // mengalihkan halaman dan memberikan pesan success
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id); // mencari data berdasarkan id

        return view('admin/editEvent', compact('event')); // mengalihkan halaman dan membawa data
    }

    public function update(Request $request, $id)
    {
        $validated = $request->all() + [ // mengambil semua data dari form
            'updated_at' => now(),
        ];

        $event = Event::findOrFail($id); // mencari data berdasarkan id

        $validated['image'] = $event->image; // mengambil data gambar lama

        if($request->hasFile('image')){
            $fileName = time() . '.' . $request->image->extension(); // membuat nama file unik
            $validated['image'] = $fileName; // menambahkan data image ke dalam array $validated

            // move file
            $request->image->move(public_path('uploads/images'), $fileName); // memindahkan file ke folder public/uploads/images

            // delete old file
            $oldPath = public_path('/uploads/images/'.$event->image); // mengambil path gambar lama
            if(file_exists($oldPath) && $event->image != 'image.png'){ // mengecek apakah gambar lama ada dan bukan gambar default
                unlink($oldPath);
            }
        }

        $event->update($validated); // mengupdate data ke database

        return redirect('/managementEventAdmin')->with('success', 'Event berhasil diubah'); // mengalihkan halaman dan memberikan pesan success
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id); // mencari data berdasarkan id
        $oldPath = public_path('/uploads/images/'.$event->image); // mengambil path gambar lama
        if(file_exists($oldPath) && $event->image != 'image.png'){ // mengecek apakah gambar lama ada dan bukan gambar default
            unlink($oldPath); // menghapus gambar lama
        }
        $event->delete(); // menghapus data dari database

        return redirect('/managementEventAdmin')->with('success', 'Event berhasil dihapus'); // mengalihkan halaman dan memberikan pesan success
    }
}
