<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;

class HomeController extends Controller
{
    public function room_details($id)
    {
        // Fetch the room details from the database using the room_id
        $room = Room::find($id);

        // Return the view with the room details
        return view('home.room_details', compact('room'));
    }

    public function add_booking(Request $request, $room_id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Create a new booking record
        $booking = new Booking;
        $booking->room_id = $room_id;
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->start_date = $request->start_date;
        $booking->end_date = $request->end_date;
        $booking->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Room booked successfully!');
    }
}
