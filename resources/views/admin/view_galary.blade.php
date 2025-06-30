<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    
    @include('admin.sidebar')
      
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <center>
                <h1 style="font-size: 40px; font-weight:bolder; color:white;">Gallary</h1>
                <div class="row">
                    <div class="col-md-4">
                        @foreach($gallary as $gallary)
                            <img style="width: 300px; height: 200px; padding: 10px;" src="/gallary/{{$gallary->image}}" alt="Image">
                            <a class="btn btn-danger" href="{{url('delete_gallary', $gallary->id)}}">Delete Image</a>
                        @endforeach
                    </div>
                </div>

                <form action="{{url('upload_gallary')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding: 25px">
                        <label style="color: white; font-weight:bold;" for="image">Upload Image</label>
                        <input type="file" name="image" id="image" required>
                        <input class="btn btn-primary" type="submit" value=" Add Image" id="image">
                    </div>
                </form>
                </center>
            </div>
        </div>
    </div>

    @include('admin.footer')
  </body>
</html>