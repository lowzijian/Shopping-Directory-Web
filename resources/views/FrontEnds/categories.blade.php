<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Pavilion Categories Navigation Page</title>

      <!-- Bootstrap core CSS -->
      <link href="\vendor\bootstrap\css\bootstrap.min.css" rel="stylesheet">

      <!-- Custom fonts for this template -->
      <link href="\vendor\fontawesome-free\css\all.min.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link href="\css\grayscale.css" rel="stylesheet">

      <style>
         .admin_config {
            position: absolute; 
            right: 10px; 
            top: 18px; 
            background-color: lightgrey; 
            opacity: 0.8;
            text-decoration: none;
            padding: 0px 25px;
         }

         .admin_config a:-webkit-any-link {
            color: -webkit-link;
            cursor: pointer;
            text-decoration: none;
         }
      </style>
   </head>

   <body onclick = "mouseClick();">
      <!-- navigation for categories -->
      <section class="categories">
         @if (Route::has('login'))
            @auth
               <div class = "jumbotron admin_config">  
                     <a href="{{ url('/admin') }}">Config</a>        
               </div>
            @endauth
         @endif

         <div class = "title"><h1 style="font-size:100px">Category</h1></div>
         <table style="width:100%">
            <tr>
               <div class = "row">
                  <!-- Food & Beverages-->
                  <div class = "col-md-3">
                     <div class="mx-auto text-center" id ="category">
                        <div class="img-fluid">
                           <a href="{{ url('frontend/categories/Food & Beverages/1?errorMessage=')}}" >
                              <img src="/img/FoodBeverages.png" alt="" >
                           </a>
                        </div>
                        <p class="text-center">Food&Beverages</p>
                     </div>
                  </div>
                  
                  <!-- Fashion-->
                  <div class = "col-md-3">
                     <div class="mx-auto text-center" id ="category">
                        <div class="img-fluid">
                           <a href="{{ url('frontend/categories/Fashion/1?errorMessage=')}}" >
                              <img src="/img/Fashion.png" alt="" >
                           </a>
                        </div>
                        <p class="text-center">Fashion</p>
                     </div>
                  </div>

                  <!-- Entertainment-->
                  <div class = "col-md-3">
                     <div class="mx-auto text-center" id ="category">
                        <div class="img-fluid">
                           <a href="{{ url('frontend/categories/Entertainment/1?errorMessage=')}}" >
                              <img src="/img/Entertainment.png" alt="" >
                           </a>
                        </div>
                        <p class="text-center">Entertainment</p>
                     </div>
                  </div>

                  <!-- Beauty&Wellness-->
                  <div class = "col-md-3">
                     <div class="mx-auto text-center" id ="category">
                        <div class="img-fluid">
                           <a href="{{ url('frontend/categories/Beauty & Wellness/1?errorMessage=')}}">
                              <img src="/img/BeautyWellness.png" alt="" >
                           </a>
                        </div>
                        <p class="text-center">Beauty&Wellness</p>
                     </div>
                  </div>
               </div>
            </tr>

            <tr>
               <div class = "row">
                  <!-- Supermarket-->
                  <div class = "col-md-3">
                     <div class="mx-auto text-center "id ="category">
                        <div class="img-fluid">
                           <a href="{{ url('frontend/categories/Supermarket/1?errorMessage=')}}">
                              <img src="/img/Supermarket.png" alt="" >
                           </a>
                        </div>
                        <p class="text-center">Supermarket</p>
                     </div>
                  </div>

                  <!-- Home-->
                  <div class = "col-md-3">
                     <div class="mx-auto text-center" id ="category">
                        <div class="img-fluid">
                           <a href="{{ url('frontend/categories/Home/1?errorMessage=')}}">
                              <img src="/img/Home.png" alt="">
                           </a>
                        </div>
                        <p class="text-center">Home</p>
                     </div>
                  </div>

                  <!-- Book&Stationeries-->
                  <div class = "col-md-3">
                     <div class="mx-auto text-center" id ="category">
                        <div class="img-fluid">
                           <a href="{{ url('frontend/categories/Book & Stationaries/1?errorMessage=')}}">
                              <img src="/img/BookStationaries.png" alt="">
                           </a>
                        </div>
                        <p class="text-center">Book&Stationeries</p>
                     </div>
                  </div>

                  <!-- Jewellry&Timepieces-->
                  <div class = "col-md-3">
                     <div class="mx-auto text-center" id ="category">
                        <div class="img-fluid">
                           <a href="{{ url('frontend/categories/Jewellry & Timepieces/1?errorMessage=')}}">
                              <img src="/img/JewellryTimepieces.png" alt="">
                           </a>
                        </div>
                        <p class="text-center">Jewellry&Timepieces</p>
                     </div>
                  </div>
               </div>
            </tr>

            <tr>
               <div class="row d-flex justify-content-center">
                  <!-- Communication&IT-->
                  <div class = "col-md-3">
                     <div class="mx-auto text-center" id ="category" style = "margin-bottom:10px;">
                        <div class="img-fluid">
                           <a href="{{ url('frontend/categories/Communication & IT/1?errorMessage=')}}">
                              <img src="/img/CommunicationIT.png" alt="">
                           </a>
                        </div>
                        <p class="text-center">Communication&IT</p>
                     </div>
                  </div>

                  <!-- Optical&Eyeware-->
                  <div class = "col-md-3">
                     <div class="mx-auto text-center" id ="category" style = "margin-bottom:10px;">
                        <div class="img-fluid">
                           <a href="{{ url('frontend/categories/Optical & Eyeware/1?errorMessage=')}}">
                              <img src="/img/OpticalEyeware.png" alt="">
                           </a>
                        </div>
                        <p class="text-center">Optical&Eyeware</p>
                     </div>
                  </div>

                  <!-- Toy&Games-->
                  <div class = "col-md-3">
                     <div class="mx-auto text-center" id ="category" style = "margin-bottom:10px;">
                        <div class="img-fluid">
                           <a href="{{ url('frontend/categories/Toy & Games/1?errorMessage=')}}">
                              <img src="/img/ToyGames.png" alt="">
                           </a>
                        </div>
                        <p class="text-center">Toy&Games</p>
                     </div>
                  </div>

                  <div class = "col-md-3 my-auto">
                     <div class="text-center">
                        <a href="{{ url('frontend')}}" class="btn btn-primary">
                        <img class="mr-4" src="/img/back.png" alt="" >Back</a>
                     </div>
                  </div>
               </div>
            </tr>
         </table>
      </section>

      <!-- Footer -->
      <footer class="bg-black small text-center text-white-50">
            Copyright &copy; Pavilion 2019
      </footer>

    <script type="text/javascript">
        var timer = 0;
        var idleTime = 60;
        var counterID = window.setInterval(function(){redirectChecker();}, 1000);

        function mouseClick(){
            timer = 0;

            clearInterval(counterID);

            counterID = window.setInterval(function(){redirectChecker();}, 1000);
        }

        function redirectChecker(){
            timer++;
            if(timer >= idleTime){
                clearInterval(counterID);
                window.location.href = "/";
            }
        }
    </script>
   </body>
</html>