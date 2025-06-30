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
                <center>
                    <h2 style="font-size: 20px; font-weight:bold;">Mail send to {{$message->name}}</h2>

                    <form action="{{url('mail',$message->id)}}" method="POST" >
                    @csrf
                    <div class="div_design">
                        <label for="greeting">Greeting:</label>
                        <input type="text" id="greeting" name="greeting">
                    </div>
                    
                    <div class="div_design"> 
                        <label for="mail_body">Mail Body:</label>
                        <textarea id="mail_body" name="body"></textarea>
                    </div>
                    <div class="div_design">
                        <label for="action_text">Action Text:</label>
                        <input type="text" id="action_text" name="action_text">
                    </div>
                    
                    <div class="div_design">
                        <label for="action_text">Action URL:</label>
                        <input type="text" id="action_text" name="action_url">
                    </div>
                    <div class="div_design">
                        <label for="end_line">End Line:</label>
                        <input type="text" id="end_line" name="end_line">
                    </div>

                    <div class="div_design">
                        <input type="submit" value="Send Mail" class="btn btn-primary">
                    </div>
                    
                </form>

                </center>
            </div>
        </div>
    </div>
   

    @include('admin.footer')
  </body>
</html>