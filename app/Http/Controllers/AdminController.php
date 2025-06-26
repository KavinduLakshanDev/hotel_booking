<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                $room = Room::all();
                return view('home.index', compact('room'));
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
        return view('home.index', compact('room'));
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
}
