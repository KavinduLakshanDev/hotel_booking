<!DOCTYPE html>
<html>
  <head> 

    <base href="/public">
    @include('admin.css')

    <style type="text/css">
        label
        {
            display: inline-block;
            width: 150px;
        }
        .div_design
        {
            padding-top: 30px;
        }
        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    
    @include('admin.sidebar')
      
   <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <div class="div_center">
                <h1 style="font-size: 22px; font-weight: bold;">Update Room</h1>
                <form action="{{ url('edit_room/'.$room->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_design">
                        <label for="room_title">Room Title:</label>
                        <input type="text" id="room_title" name="room_title" value="{{ $room->room_title }}" required>
                    </div>
                    <div class="div_design">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" required>{{ $room->description }}</textarea>
                    </div>
                    <div class="div_design">
                        <label for="price">Price:</label>
                        <input type="number" id="price" name="price" value="{{ $room->price }}" required>
                    </div>
                    <div class="div_design">
                        <label for="wifi">Free WiFi:</label>
                        <select id="wifi" name="wifi">
                             <option selected value="{{ $room->wifi }}">{{ $room->wifi }}</option>
                            <option value="yes" >Yes</option>
                            <option value="no" >No</option>
                        </select>
                    </div>
                    <div class="div_design">
                        <label for="room_type">Room Type:</label>
                        <select id="room_type" name="room_type">
                            <option selected value="{{ $room->room_type }}">{{ $room->room_type }}</option>
                            <option value="regular" >Regular</option>
                            <option value="premium" >Premium</option>
                            <option value="delux" >Delux</option>
                        </select>
                    </div>
                    <div class="div_design" >
                        <label for="image">Current Image:</label>
                        <img style="margin:auto;" width="100" src="/room/{{$room->image}}">
                    </div>
                    <div class="div_design">
                        <label for="image">Upload Image:</label>
                        <input type="file" id="image" name="image">
                    </div>
                    <div class="div_design">
                        <input type="submit" value="Update Room" class="btn btn-primary">
                    </div>
                </form>
            </div>
          </div>
        </div>
   </div>

    @include('admin.footer')
  </body>
</html>