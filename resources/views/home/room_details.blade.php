<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
      @include('home.css')

      <style type="text/css">
         label{
            display: inline-block;
            width: 200px;
            font-size: 20px;
            padding: 5px;
         }
         input{
            color: black;
            width: 300px;
            padding: 5px;
            font-size: 20px;
            border-radius: 5px;
            border: 1px solid black;
         }
      </style>
   </head>

   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
    
      <header>
         @include('home.header')  
      </header>
      


      <div  class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Room</h2>
                     <p>Lorem Ipsum available, but the majority have suffered </p>
                  </div>
               </div>
            </div>

           
            <div class="row">
               
               <div class="col-md-8">
                  <div id="serv_hover"  class="room">
                     <div style="padding: 20px" class="room_img">
                        <figure><img style="height: 300px"; width="800px"; src="/room/{{$room->image}}" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3>{{$room->room_title}}</h3>
                        <p style="padding: 12px">{{$room->description}}</p>
                        <h4 style="padding: 12px">Free Wifi: {{$room->wifi}}</h4>
                        <h4 style="padding: 12px">Type: {{$room->type}}</h4>
                        <h4 style="padding: 12px"> Price: {{$room->price}}</h4>

                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <h1 style="font-size: 40px!important;">Book Room</h1>

                  @if($errors)
                  @foreach ($errors->all() as $errors)
                      <li style="color: red; font-size: 20px; padding: 10px; list-style: none;">
                        {{$errors}}
                      </li>
                  @endforeach

                  @endif


                  <form action="{{url('add_booking', $room->id)}}" method="POST">
                     @csrf
                  <div>
                     <label>Name</label>
                     <input type="text" name="name" 
                     @if(Auth::id())
                     value="{{Auth::user()->name}}">
                     @endif
                  </div>
                  <div>
                     <label>Email</label>
                     <input type="email" name="email"
                      @if(Auth::id())
                     value="{{Auth::user()->email}}">
                     @endif>
                  </div>
                  <div>
                     <label>Phone</label>
                     <input type="number" name="phone"
                      @if(Auth::id())
                     value="{{Auth::user()->phone}}">
                     @endif>
                  </div>
                  <div>
                     <label>Start Date</label>
                     <input type="date" name="start_date" id="start_date">
                  </div>
                  <div>
                     <label>End Date</label>
                     <input type="Date" name="end_date" id ="end_date">
                  </div>
                  <div style="padding-top:20px ">
                     <input type="submit" value="Book Room" class="btn btn-primary" style="margin-top: 20px">
                  </div>
                  </form>
               </div>
            </div>
         </div>
</div>







    
      <!--  footer -->
      @include('home.footer')
      <!-- end footer -->
      

<script type="text/javascript">
   $(function(){
      var dtToday = new Date();
      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if(month < 10)
         month = '0' + month.toString();
      if(day < 10)
         day = '0' + day.toString();
      var maxDate = year + '-' + month + '-' + day;
      $('#start_date').attr('min', maxDate); 
      $('#end_date').attr('min', maxDate);
   });
</script>
   </body>
</html>