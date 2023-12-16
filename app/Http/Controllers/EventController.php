<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Exception;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(5); // Corrected 'pagenate' to 'paginate'
        return view('event.index', compact('events')); // Changed variable name to plural 'events'
    }

    public function create()
    {
        return view('event.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_user' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'harga' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            Event::create([
                'id_user' => $request->id_user,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'image' => $imageName,
                'harga' => $request->harga,
            ]);

            try {
                return redirect()->route('event.index');
            } catch (Exception $e) {
                return redirect()->route('event.index');
            }
        }
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view('event.edit', compact('events'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);

        $this->validate($request, [
            'id_user' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $event->image = $imageName;
        }

        $event->update([
            'id_user' => $request->id_user,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'image' => $imageName,
            'harga' => $request->harga,
        ]);

        return redirect()->route('event.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('event.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
