<!DOCTYPE html>
<html lang="en">
   <head>
      @include('home.css')
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
      <!-- end header inner -->
      <!-- end header -->

      
      <!-- end our_room -->
      <!-- gallery -->
     @include('home.galary')
      <!-- end gallery -->
      
      <!--  footer -->
      @include('home.footer')
      <!-- end footer -->
      
   </body>
</html>