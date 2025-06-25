<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
      .table-design {
          border: 2px solid rgb(243, 243, 243);
          width: 50%;
          margin: auto;
          text-align: center;
          margin-top: 20px;
          margin-top: 40px;
      }
      .table-design th, .table-design td {
          /* background-color: skyblue; */
          border: 1px solid black;
          padding: 30px;
          text-align: left;
      }
      .table-design th {
          background-color: #f2f2f2;
      }

    </style>
  </head>
  <body>
    @include('admin.header')
    
    @include('admin.sidebar')
      
    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <table class="table-design">
                <tr>
                    <th>Room Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Wifi</th>
                    <th>Room Type</th>
                    <th>Image</th>
                </tr>
                @foreach($room as $room)
                <tr>
                    <td>{{ $room->room_title }}</td>
                    <td>{!! Str::limit($room->description, 50) !!}</td>
                    <td>{{ $room->price }}LKR</td>
                    <td>{{ $room->wifi }}</td>
                    <td>{{ $room->room_type }}</td>
                    <td><img src="{{ asset('room/'.$room->image) }}" alt="Room Image" style="width: 100px; height: 100px;"></td>
                </tr>
                @endforeach
            </table>
          </div>
        </div>
      </div>

    @include('admin.footer')
  </body>
</html>