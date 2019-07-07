<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Custom scripts for this template -->
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="js/fullclip.js"></script>

    <title>Pavilion</title>

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

  <body>
    <!-- Header -->
    <header class="masthead">
      @if (Route::has('login'))
        @auth
          <div class = "jumbotron admin_config">
            <a href="{{ url('/admin') }}">Config</a>
          </div>
        @endauth
      @endif

      <div class="container d-flex h-100 align-items-center">
        <div class="m-auto text-center bg-black p-5" style = "opacity: 0.9;border-radius: 25px; ">
          <h1 class="m-auto text-uppercase">Pavilion</h1>
          <h2 class="text-white mx-auto mt-2 mb-5">Stylish Shopping Experience</h2>
          <a href="{{ url('frontend')}}" class="btn btn-primary ">Search</a>
        </div>
      </div>
    </header>

      <!-- Footer -->
    <footer class="bg-black small text-center text-white-50">
        Copyright &copy; Pavilion 2019
    </footer>
    
    <script>
      $('.masthead').fullClip({
        images: ['/img/masthead.jpg', '/img/masthead2.jpg', '/img/masthead3.jpg'],
        transitionTime: 2000,
        wait: 5000
      });
    </script>
  </body>
</html>
