<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Exception;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $review = Review::where('id_user', Auth::id())->oldest()->paginate(5);

        return view('review.index', compact('review'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('review.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        // Validasi Formulir
        $this->validate($request, [
            'id_user' => 'required',
            'review' => 'required',
        ]);

        Event::create([
            'id_user' => $request->judul,
            'review' => $request->penulis,
        ]);

        try {
            return redirect()->route('event.index');
        } catch (Exception $e) {
            return redirect()->route('event.index');
        }
    }

    /**
     * edit
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('event.edit', compact('event'));
    }

    /**
     * update
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);

        // Validate form
        $this->validate($request, [
            'id_user' => 'required',
            'review' => 'required',
        ]);

        $event->update([
            'id_user' => $request->judul,
            'review' => $request->penulis,
        ]);

        return redirect()->route('event.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('event.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
