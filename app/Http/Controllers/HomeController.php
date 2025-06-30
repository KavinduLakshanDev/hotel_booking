<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;

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



        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $isBooked = Booking::where('room_id', $room_id)
            ->where(function ($query) use ($start_date, $end_date) {
                $query->whereBetween('start_date', [$start_date, $end_date])
                      ->orWhereBetween('end_date', [$start_date, $end_date])
                      ->orWhere(function ($query) use ($start_date, $end_date) {
                          $query->where('start_date', '<=', $start_date)
                                ->where('end_date', '>=', $end_date);
                      });
            })
            ->exists();

            if ($isBooked) {
                return redirect()->back()->with('error', 'This room is already booked for the selected dates. please choose different dates.');
            }
            else {
                $booking->start_date = $start_date;
                $booking->end_date = $end_date;

                // Save the booking to the database
                $booking->save();

                // Redirect back with a success message
                return redirect()->back()->with('success', 'Booking successfully created!');
            }
        
    }

    public function contact(Request $request)
    {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
