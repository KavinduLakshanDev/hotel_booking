<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style type="text/css">
      .table-design {
          border: 2px solid rgb(243, 243, 243);
          width: 90%;
          margin: auto;
          text-align: center;
          margin-top: 40px;
      }
      .table-design th, .table-design td {
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
                    <th>Delete</th>
                </tr>
                @foreach($room as $room)
                <tr>
                    <td>{{ $room->room_title }}</td>
                    <td>{!! Str::limit($room->description, 50) !!}</td>
                    <td>{{ $room->price }} LKR</td>
                    <td>{{ $room->wifi }}</td>
                    <td>{{ $room->room_type }}</td>
                    <td>
                        <img src="{{ asset('room/'.$room->image) }}" alt="Room Image" style="width: 100px; height: 100px;">
                    </td>
                    <td>
                        <button class="btn btn-danger delete-btn" data-id="{{ $room->id }}">Delete</button>
                    </td>
                </tr>
                @endforeach
            </table>
          </div>
        </div>
    </div>

    <!-- SweetAlert Delete Script -->
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
          button.addEventListener('click', function () {
            const roomId = this.getAttribute('data-id');
            
            Swal.fire({
              title: 'Are you sure?',
              text: "This action cannot be undone!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = '/delete_room/' + roomId;
              }
            });
          });
        });
      });
    </script>

    @include('admin.footer')
  </body>
</html>
