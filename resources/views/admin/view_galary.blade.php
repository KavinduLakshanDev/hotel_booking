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

                <form action="{{url('upload_gallary')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="image">Upload Image</label>
                        <input type="file" name="image" id="image">
                    </div>

                    <div>
                
                        <input type="submit" value=" Add Image" id="image">
                    </div>
                </form>
                </center>
            </div>
        </div>
    </div>

    @include('admin.footer')
  </body>
</html>