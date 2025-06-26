<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class HomeController extends Controller
{
    public function room_details($id)
    {
        // Fetch the room details from the database using the room_id
        $room = Room::find($id);

        // Check if the room exists
        if (!$room) {
            return redirect()->back()->with('error', 'Room not found');
        }

        // Return the view with the room details
        return view('home.room_details', compact('room'));
    }
}
