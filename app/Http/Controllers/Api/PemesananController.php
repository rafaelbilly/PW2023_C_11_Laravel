<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanans = Pemesanan::all();

        if (count($pemesanans) > 0) {
            return response([
                'message' => 'Retrieve All Pemesanan',
                'data' => $pemesanans
            ], 200);
        }

        return response([
            'message' => 'Pemesanan Empty',
            'data' => null,
        ], 400);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pemesanans = Pemesanan::find($id);

        if (!is_null($pemesanans)) {
            return response([
                'message' => 'Pemesanan found',
                'data' => $pemesanans
            ], 200);
        }

        return response([
            'message' => 'Pemesanan Not Found',
            'data' => null
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemesanans = Pemesanan::find($id);

        if (is_null($pemesanans)) {
            return response([
                'message' => 'Pemesanan Not Found',
                'data' => null
            ], 404);
        }

        if ($pemesanans->delete()) {
            return response([
                'message' => 'Delete Content Success',
                'data' => $pemesanans
            ], 200);
        }
        return response([
            'message' => 'Delete Pemesanan Failed',
            'data' => null
        ], 400);
    }
}
