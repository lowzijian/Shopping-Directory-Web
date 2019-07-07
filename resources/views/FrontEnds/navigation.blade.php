<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Navigation</title>

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
    <!-- navigation -->
    <section class="navigation">
      @if (Route::has('login'))
        <div class = "jumbotron admin_config">
            @auth
              <a href="{{ url('/admin') }}">Config</a>
            @endauth
        </div>
      @endif

      <div class="container d-flex h-100 align-items-center">
        <div class = "row m-auto">
          <div class="col-md-4 mx-auto text-center" id ="selection">
            <div class="img-fluid"><img src="img/mall-stand.png" alt=""></div>
            <a href="{{ url('frontend/categories')}}" class="btn btn-primary ">Search by Categories</a>
          </div>
          <div class="col-md-4 mx-auto text-center" id ="selection">
            <div class="img-fluid" ><img src="img/search.png" alt=""></div>
            <a href="{{ url('/frontend/searchAll/1?errorMessage=') }}" class="btn btn-primary ">Search All</a>
          </div>
          <div class="col-md-4 mx-auto text-center" id ="selection">
            <div class="img-fluid" ><img src="img/placeholder.png" alt=""></div>
            <a href="{{ url('/frontend/mapView/1?errorMessage=') }}" class="btn btn-primary ">View Map</a>
          </div>
        </div>
      </div>
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