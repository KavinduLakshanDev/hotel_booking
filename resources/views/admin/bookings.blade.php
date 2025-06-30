<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
        .table-design {
          border: 2px solid rgb(243, 243, 243);
          width: 100%;
          margin: auto;
          text-align: center;
          margin-top: 40px;
      }
      .table-design th, .table-design td {
          border: 1px solid black;
          padding: 15px;
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
                    <th>Room_ID</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Arrival Date</th>
                    <th>Leaving Date</th>
                    <th>Status</th>
                    <th>Room title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Delete</th>
                </tr>
                
                @foreach($bookings as $booking)
                <tr>
                    <td>{{$booking->room_id}}</td>
                    <td>{{$booking->name}}</td>
                    <td>{{$booking->email}}</td>
                    <td>{{$booking->phone}}</td>
                    <td>{{$booking->start_date}}</td>
                    <td>{{$booking->end_date}}</td>
                    <td>{{$booking->status}}</td>
                    <td>{{$booking->room->room_title}}</td>
                    <td>{{$booking->room->price}}</td>
                    <td>
                        <img src="/room/{{$booking->room->image}}" alt="Room Image" style="width: 100px; height: 100px;">
                    </td>
                    <td>
                        <a onclick="return confirm('Are you sure you want to delete this booking?')" class="btn btn-danger" href="{{url('delete_booking', $booking->id)}}">Delete</a>
                    </td>
                   
                    
                </tr>
               @endforeach
            </table>
            </div>
        </div>
    </div>

    @include('admin.footer')
  </body>
</html>