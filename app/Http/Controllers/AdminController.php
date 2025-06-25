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
        if(Auth::id())
        {
            $usertype = Auth::user()->usertype;

            if($usertype == 'user')
            {
                return view('home.index');
            }

            if($usertype == 'admin')
            {
                return view('admin.index');
            }
            
            else
            {
                return redirect()->back();
            }
        }
    }

    public function home()
    {
        return view('home.index');
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
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $room->image = $imagename;
        }
        else
        {
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

}
