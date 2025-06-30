<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Send Email</th>
                </tr>
                
                @foreach($messages as $message)
                <tr>
                    <td>{{$message->name}}</td>
                    <td>{{$message->email}}</td>
                    <td>{{$message->phone}}</td>
                    <td>{{$message->message}}</td>
                    <td>
                        <a class="btn btn-success" href="{{url('send_mail',$message->id)}}">Send Email</a>
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