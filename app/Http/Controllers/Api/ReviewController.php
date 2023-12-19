<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();

        if (count($reviews) > 0) {
            return response([
                'message' => 'Retrieve All Review',
                'data' => $reviews
            ], 200);
        }

        return response([
            'message' => 'Review Empty',
            'data' => null,
        ], 400);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $storeData = $request->all();

        $validate = Validator::make($storeData, [
            'id_user' => 'required|exists:users,id',
            'id_event' => 'required|exists:events,id',
            'review' => 'required',
        ]);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()], 400);
        }

        $user = User::find($storeData['id_user']);
        if (!$user) {
            return response(['message' => 'User not found'], 400);
        }

        $event = Event::find($storeData['id_event']);
        if (!$event) {
            return response(['message' => 'Event not found'], 400);
        }

        $review = Review::create($storeData);

        return response([
            'message' => 'Add Review Success',
            'data' => $review,
        ], 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reviews = Review::find($id);

        if (!is_null($reviews)) {
            return response([
                'message' => 'Review found',
                'data' => $reviews
            ], 200);
        }

        return response([
            'message' => 'Review Not Found',
            'data' => null
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reviews = Review::find($id);

        if (is_null($reviews)) {
            return response([
                'message' => 'Review Not Found',
                'data' => null
            ], 404);
        }

        if ($reviews->delete()) {
            return response([
                'message' => 'Delete Review Success',
                'data' => $reviews
            ], 200);
        }
        return response([
            'message' => 'Delete Review Failed',
            'data' => null
        ], 400);
    }
}
