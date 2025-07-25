<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Galary; 
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                $room = Room::all();
                $gallary = Galary::all();
                return view('home.index', compact('room', 'gallary'));
            }

            if ($usertype == 'admin') {
                return view('admin.index');
            } else {
                return redirect()->back();
            }
        }
    }

    public function home()
    {
        $room = Room::all();
        $gallary = Galary::all();
        return view('home.index', compact('room', 'gallary'));
    }

    public function create_room()
    {
        return view('admin.create_room');
    }

    public function add_room(Request $request)
    {
        $room = new Room;
        $room->room_title = $request->room_title;
        $room->image = $request->image;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->wifi = $request->wifi;
        $room->room_type = $request->room_type;

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $room->image = $imagename;
        } else {
            $room->image = '';
        }

        // Save the room to the database

        $room->save();

        return redirect()->back()->with('message', 'Room added successfully');
    }

    public function view_room()
    {

        $room = Room::all();
        return view('admin.view_room', compact('room'));
    }


    public function delete_room($room_id)
    {
        $room = Room::find($room_id);

        if ($room) {
            $room->delete();
            return redirect()->back()->with('message', 'Room deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Room not found');
        }
    }
    public function update_room($room_id)
    {
        $room = Room::find($room_id);
        return view('admin.update_room', compact('room'));
    }

    public function edit_room(Request $request, $room_id)
    {
        $room = Room::find($room_id);

        $room->room_title = $request->room_title;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->wifi = $request->wifi;
        $room->room_type = $request->room_type;
        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $room->image = $imagename;
           
        }


        $room->save();

        return redirect()->back();
    }

    public function bookings()
    {
        // $bookings = \DB::table('bookings')
        //     ->join('users', 'bookings.user_id', '=', 'users.id')
        //     ->join('rooms', 'bookings.room_id', '=', 'rooms.id')
        //     ->select('bookings.*', 'users.name as user_name', 'rooms.room_title as room_title')
        //     ->get();
        
        $bookings = Booking::all();
        return view('admin.bookings', compact('bookings'));
    }

    public function delete_booking($id)
    {
        $booking = Booking::find($id);

        if ($booking) {
            $booking->delete();
            return redirect()->back()->with('message', 'Booking deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Booking not found');
        }
    }

    public function approve_booking($id)
    {
        $booking = Booking::find($id);

        if ($booking) {
            $booking->status = 'approved'; // Change status to approved
            $booking->save();
            return redirect()->back()->with('message', 'Booking approved successfully');
        } else {
            return redirect()->back()->with('error', 'Booking not found');
        }
    }

    public function reject_booking($id)
    {
        $booking = Booking::find($id);

        if ($booking) {
            $booking->status = 'rejected'; // Change status to rejected
            $booking->save();
            return redirect()->back()->with('message', 'Booking rejected successfully');
        } else {
            return redirect()->back()->with('error', 'Booking not found');
        }
    }

    public function view_galary()
    {
        $gallary = Galary::all();
        return view('admin.view_galary', compact('gallary'));
    }

    public function upload_gallary(Request $request)
    {
        $gallary = new Galary;

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('gallary', $imagename);
            $gallary->image = $imagename;
        } else {
            $gallary->image = '';
        }

        // Save the gallary to the database
        $gallary->save();

        return redirect()->back()->with('message', 'Image uploaded successfully');
    }

    public function delete_gallary($id)
    {
        $gallary = Galary::find($id);
        $gallary->delete();
        return redirect()->back();
    }

    public function all_messages()
    {
        $messages = Contact::all();
        return view('admin.all_messages', compact('messages'));
    }

    public function send_mail($id)
    {
        $message = Contact::find($id);
        return view('admin.send_mail', compact('message'));
    }

    public function mail(Request $request, $id)
    {
        $message = Contact::find($id);

        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'end_line' => $request->end_line,
        ];

        Notification::send($message, new SendEmailNotification($details));

        return redirect()->back();
       
    }
}
 