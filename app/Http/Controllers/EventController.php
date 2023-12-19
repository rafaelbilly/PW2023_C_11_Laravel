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
        $acara2Data = Event::latest()->get(); 

        $acara2 = $acara2Data->map(function ($e) { 
            return [
                'nama' => $e->nama, 
                'gambar' => asset('uploads/images/' . $e->image), 
            ];
        })->take(4)->toArray(); 

        $pemesananData = Pemesanan::latest()->get(); 

        $admin = $pemesananData->map(function ($p) { 
            return [
                'invoice' => $p->invoice, 
                'nama' => $p->user->username, 
                'price' => $p->total_biaya, 
                'status' => ucfirst($p->status), 
                'keterangan' => $p->status, 
            ];
        })->toArray(); 

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
        $eventData = Event::latest()->get(); 

        if ($request->filled('keyword')) { 
            $eventData = Event::where('nama', 'like', "%{$request->keyword}%") 
                ->orWhere('deskripsi', 'like', "%{$request->keyword}%") 
                ->orWhere('deskripsi2', 'like', "%{$request->keyword}%")
                ->latest()->get(); 
        }

        $event = $eventData->map(function ($e) { 
            return [
                'id' => $e->id,
                'gambarEvent' => asset('uploads/images/' . $e->image), 
                'judul' => $e->nama, 
                'deskripsi' => $e->deskripsi, 
                'deskripsi2' => $e->deskripsi2, 
            ];
        })->toArray(); 

        return view('admin/managementEventAdmin', compact('event'));
    }

    public function store(Request $request)
    {
        $validated = $request->all() + [
            'id_user' => auth()->id(), 
            'created_at' => now(),
        ]; 

        if($request->hasFile('image')){
            $fileName = time() . '.' . $request->image->extension();
            $validated['image'] = $fileName; 

            // move file
            $request->image->move(public_path('uploads/images'), $fileName); 
        }

        $event = Event::create($validated); 

        return redirect('/managementEventAdmin')->with('success', 'Event berhasil ditambahkan'); 
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id); 

        return view('admin/editEvent', compact('event')); 
    }

    public function update(Request $request, $id)
    {
        $validated = $request->all() + [ 
            'updated_at' => now(),
        ];

        $event = Event::findOrFail($id); 

        $validated['image'] = $event->image; 

        if($request->hasFile('image')){
            $fileName = time() . '.' . $request->image->extension(); 
            $validated['image'] = $fileName; 

            // move file
            $request->image->move(public_path('uploads/images'), $fileName); 

            // delete old file
            $oldPath = public_path('/uploads/images/'.$event->image); 
            if(file_exists($oldPath) && $event->image != 'image.png'){ 
                unlink($oldPath);
            }
        }

        $event->update($validated); 

        return redirect('/managementEventAdmin')->with('success', 'Event berhasil diubah'); 
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id); 
        $oldPath = public_path('/uploads/images/'.$event->image); 
        if(file_exists($oldPath) && $event->image != 'image.png'){ 
            unlink($oldPath); 
        }
        $event->delete(); 

        return redirect('/managementEventAdmin')->with('success', 'Event berhasil dihapus'); 
    }
}
