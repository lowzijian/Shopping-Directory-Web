<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pavilion</title>

    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

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

        .admin_config:hover {
            opacity: 0.5;
        }
    </style>
</head>

<body onclick = "mouseClick();">
    <section class = "info container col-12" style = "height:auto; min-height:100vh;">
        @if(!(Request::is('frontend/categories/*') || Request::is('frontend/mapView/*')))
            @if($errorMessage != '')
                <div class="alert alert-danger" role="alert">
                    Not records matched with the previous filters combination.
                </div>
            @endif
        @endif
        <div class = "row">
            <div class = "col-md-10">
                @if (\Request::is('frontend/searchAll/*')) 
                    @include('FrontEnds._filters')
                @else
                    <div class="bg-black mt-4" style = "border-radius: 0px 50px 50px 0px;">
                        <?php
                            $category = str_replace(array(' ', '&'), '', $headerValue);
                        ?>
                        <h1 style="font-size:70px" class = "title">{{ $header }} : {{ $headerValue }} <img class = "ml-3"src="/img/<?php echo $category; ?>.png" alt=""></h1>
                    </div>
                @endif
            </div>

            <div class="col-md-2 mx-auto mt-5">
                @if (Route::has('login'))
                    @auth
                        <div class = "jumbotron admin_config">  
                            <a href="{{ url('/admin') }}">Config</a>        
                        </div>
                    @endauth
                @endif

                @if(\Request::is('frontend/mapView/*/*'))
                    <a class="btn btn-primary" href="{{ route('frontend.mapView', $floorId)}}"> 
                        <img class = "mx-2" src="/img/back.png" alt="" >Back   
                    </a>
                @else
                    <a class="btn btn-primary" href="{{ route('frontend.clearing.clearSession', $previousPage) }}"> 
                        <img class = "mx-2" src="/img/back.png" alt="">Back   
                    </a>
                @endif
            </div>            
        </div>
    
        <div class = "row my-5 detail" style = "height:auto;">
            <div class = "col-md-5 m-auto">
                <table>
                    <!-- Shop detail -->
                    <tr>
                        <div class = "row m-auto py-2">
                            <h1 style="font-size:50px">{{ $selectedTenant -> shopName }}</h1>
                        </div>
                    </tr>

                    <!-- Lot Number -->
                    <tr>
                        <div class = "row m-auto py-1">
                            <h4>{{ $selectedTenant -> lotNo }}</h4>
                        </div>
                    </tr>

                    <!-- Category -->
                    <tr>
                        <div class = "row m-auto">
                            <h4>{{ $selectedTenant->Category->name }}</h4>
                        </div>
                    </tr>

                    <!-- floor & Zones -->
                    <tr>
                        <div class = "row col-8 d-flex justify-content-between">
                                <h4>Floor {{ $selectedTenant->floor }}</h4>
                                <h4>{{ $selectedTenant->Zone->name }} Zone</h4>
                        </div>
                    </tr>

                    <!-- Description -->
                    <tr>
                        <div class = "row m-auto py-4">
                            <h1 style="font-weight:bold"> Description : <h1><br>
                        </div>

                        <div class = "row m-auto p-auto">
                            <h5>{{ $selectedTenant -> description }}</h5>
                        </div>
                    </tr>
                </table>
            </div>  

            <div class = "col-md-5 m-auto ">
                <!-- Shop Front Photo -->
                <div class = "img text-center">
                    <img class = "rounded bg-light p-2 text-center" src="/storage/tenants/{{$selectedTenant->lotNo}}.jpg" width="100%" height="100%" alt="{{ $selectedTenant->shopName }} Front Store">
                </div>
            </div>

            <div class = "col-md-2 m-auto">
                <!-- Side Bar -->
                <hr class="my-2" style="border: 10px solid grey; border-radius: 5px;">
                <div class = "sideBar">
                    <ul class="nav flex-column nav-pills nav-justified">
                        <!-- loop -->
                        @foreach($tenants as $i => $tenant)
                            <li class = "{{
                                ($tenant -> id == $id)?
                                    'jumbotron m-0 p-0': ''
                            }} nav-item" style = "{{
                                ($tenant -> id == $id)?
                                    'background: lightblue': ''
                            }}">
                                @if (\Request::is('frontend/mapView*'))
                                    <a class = "nav-link " style = "color:black;">
                                        {!! link_to_route(
                                            'frontend.'.$filterName,
                                            $title = $tenant -> shopName,
                                            $parameters = [
                                                'floorId' => $floorId,
                                                'id' => $tenant -> id
                                        ]) !!}
                                    </a>
                                @else
                                    <a class = "nav-link " style = "color:black;">
                                        {!! link_to_route(
                                            'frontend.'.$filterName,
                                            $title = $tenant -> shopName,
                                            $parameters = [
                                                'categoryName' => $categoryName,
                                                'errorMessage' => '',
                                                'id' => $tenant -> id
                                        ]) !!}
                                    </a>
                                @endif
                            </li>
                        @endforeach
                    </ul>  
                </div>
                <hr class="my-2" style="border: 10px solid grey; border-radius: 5px;">
            </div>
        </div>
    </section>

  <!-- Footer -->
    <footer class="m-auto bg-black small text-center text-white-50">
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
