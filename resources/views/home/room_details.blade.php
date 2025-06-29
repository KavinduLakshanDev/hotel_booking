{{-- <!DOCTYPE html>
<html lang="en">
   <head>
      <base href="/public">
      @include('home.css')

      <!-- SweetAlert2 CDN -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <style type="text/css">
         label {
            display: inline-block;
            width: 200px;
            font-size: 20px;
            padding: 5px;
         }
         input {
            color: black;
            width: 300px;
            padding: 5px;
            font-size: 20px;
            border-radius: 5px;
            border: 1px solid black;
         }
      </style>
   </head>

   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->

      <header>
         @include('home.header')
      </header>

      <div class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Room</h2>
                     <p>Lorem Ipsum available, but the majority have suffered</p>
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="col-md-8">
                  <div id="serv_hover" class="room">
                     <div style="padding: 20px" class="room_img">
                        <figure><img style="height: 300px; width: 800px;" src="/room/{{$room->image}}" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3>{{$room->room_title}}</h3>
                        <p style="padding: 12px">{{$room->description}}</p>
                        <h4 style="padding: 12px">Free Wifi: {{$room->wifi}}</h4>
                        <h4 style="padding: 12px">Type: {{$room->type}}</h4>
                        <h4 style="padding: 12px">Price: {{$room->price}}</h4>
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
                           value="{{Auth::user()->name}}"
                        @endif>
                     </div>
                     <div>
                        <label>Email</label>
                        <input type="email" name="email"
                        @if(Auth::id())
                           value="{{Auth::user()->email}}"
                        @endif>
                     </div>
                     <div>
                        <label>Phone</label>
                        <input type="number" name="phone"
                        @if(Auth::id())
                           value="{{Auth::user()->phone}}"
                        @endif>
                     </div>
                     <div>
                        <label>Start Date</label>
                        <input type="date" name="start_date" id="start_date">
                     </div>
                     <div>
                        <label>End Date</label>
                        <input type="date" name="end_date" id="end_date">
                     </div>
                     <div style="padding-top:20px ">
                        <input type="submit" value="Book Room" class="btn btn-primary" style="margin-top: 20px">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>

      <!-- Footer -->
      @include('home.footer')

      <!-- Date script -->
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

      <!-- SweetAlert for Success Message -->
      @if(session('success'))
      <script>
         Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
         });
      </script>
      @endif

   </body>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
   <base href="/public">
   @include('home.css')

   <!-- Bootstrap 5 -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

   <!-- SweetAlert2 -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   <!-- Custom Modern Styles -->
   <style>
      body {
         background-color: #f8f9fa;
         font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }
      .card {
         border: none;
         border-radius: 20px;
         box-shadow: 0 0 30px rgba(0, 0, 0, 0.05);
      }
      .form-label {
         font-weight: 600;
         margin-bottom: 6px;
      }
      .form-control {
         border-radius: 12px;
         padding: 10px 15px;
         border: 1px solid #ced4da;
      }
      .btn-modern {
         background: #2d6cdf;
         border: none;
         color: white;
         font-weight: 600;
         border-radius: 12px;
         padding: 10px 18px;
         transition: 0.3s;
      }
      .btn-modern:hover {
         background: #1f4db3;
      }
      .section-title {
         font-size: 2.2rem;
         font-weight: 700;
         color: #333;
      }
   </style>
</head>

<body>
   <!-- Loader -->
   <div class="loader_bg">
      <div class="loader"><img src="images/loading.gif" alt="Loading"/></div>
   </div>

   <!-- Header -->
   @include('home.header')

   <!-- Main Content -->
   <section class="py-5">
      <div class="container">
         <div class="text-center mb-5">
            <h2 class="section-title">Our Room</h2>
            <p class="text-muted">Discover your perfect stay. Stylish comfort, smart booking.</p>
         </div>

         <div class="row g-5">
            <!-- Room Info -->
            <div class="col-lg-8">
               <div class="card p-4">
                  <img src="/room/{{$room->image}}" alt="Room" class="img-fluid rounded mb-4" style="height: 320px; object-fit: cover; width: 100%;">
                  <h3 class="fw-bold">{{$room->room_title}}</h3>
                  <p class="text-muted">{{$room->description}}</p>
                  <ul class="list-group list-group-flush mt-3">
                     <li class="list-group-item"><strong>Free Wifi:</strong> {{$room->wifi}}</li>
                     <li class="list-group-item"><strong>Type:</strong> {{$room->type}}</li>
                     <li class="list-group-item"><strong>Price:</strong> {{$room->price}}</li>
                  </ul>
               </div>
            </div>

            <!-- Booking Form -->
            <div class="col-lg-4">
               <div class="card p-4">
                  <h4 class="mb-4 fw-bold text-center">Book This Room</h4>

                  @if($errors)
                     @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                     @endforeach
                  @endif

                  <form action="{{ url('add_booking', $room->id) }}" method="POST">
                     @csrf

                     <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                           @if(Auth::id()) value="{{ Auth::user()->name }}" @endif required>
                     </div>

                     <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control"
                           @if(Auth::id()) value="{{ Auth::user()->email }}" @endif required>
                     </div>

                     <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="number" name="phone" id="phone" class="form-control"
                           @if(Auth::id()) value="{{ Auth::user()->phone }}" @endif required>
                     </div>

                     <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                     </div>

                     <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                     </div>

                     <div class="d-grid">
                        <button type="submit" class="btn btn-modern btn-lg">Book Now</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- Footer -->
   @include('home.footer')

   <!-- Date Validation Script -->
   <script>
      document.addEventListener("DOMContentLoaded", function () {
         const today = new Date().toISOString().split('T')[0];
         document.getElementById("start_date").setAttribute('min', today);
         document.getElementById("end_date").setAttribute('min', today);
      });
   </script>

   <!-- Swal for Success -->
   @if(session('success'))
   <script>
      Swal.fire({
         icon: 'success',
         title: 'Success!',
         text: '{{ session('success') }}',
         confirmButtonColor: '#3085d6',
         confirmButtonText: 'OK'
      });
   </script>
   @endif
</body>
</html>
