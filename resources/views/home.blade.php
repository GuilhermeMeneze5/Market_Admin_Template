
@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/choices.css')}}">
    <script src="https://polyfill.io./v3/polyfill.min.js?features=default" ></script>
    <script>
        if ('geolocation'in navigator){
            navigator.geolocation.getCurrentPosition(function(position){
                console.log(position)
            },)

        }else{
            alert('ops,não foi possivel pegar localizaão')
        }

    </script>

    <!-- Custom styles for this template-->

    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}


    </style>
</head>
<body class="w3-light-grey">



<!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main">

        <!-- Header -->
        <header class="w3-container" style="padding-top:22px">
            <h5><b></i>Dashboard</b></h5>
        </header>

        <div class="w3-row-padding w3-margin-bottom">
            <div class="row">

                <!--EVENTS PROGRAMED TODAY -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Events programed today</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$events}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300" style="color: #d3d3d3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--ALERTS-->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Groups in action</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$groups}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-bell fa-2x text-gray-300"style="color: #d3d3d3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--USERS IN ACTIVITY (TODAY ) -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Users in activity (today    )
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">1/{{$users}}</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar"
                                                    style="width: 100%" aria-valuenow="1" aria-valuemin="{{$users}}"
                                                    aria-valuemax="{{$users}}"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-users fa-2x text-gray-300"style="color: #d3d3d3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MESSAGES -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Messages</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$messages}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"style="color: #d3d3d3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div> <!-- End Cards -->
             <!-- Area Chart -->

            <!-- Main Content -->
                            <div>
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Operations</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="myAreaChart"></canvas>
                                        </div>
                                        <hr>
                                        <!--Styling for the area chart can be found in the
                                        <code>/js/demo/chart-area-demo.js</code> file.-->
                                    </div>
                                </div>
                            </div>

    <!-- END CHAR -->

    <div class="card border-left-primary shadow h-100 py-2">
    <div class="w3-panel">

    <!-- <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
        <h5>Regions</h5>
        <div class="mapouter"><div class="gmap_canvas">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14613.743929148315!2d-46.55173!3d-23.69612!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xaaa891f87a77a188!2sPrefeitura%20de%20S%C3%A3o%20Bernardo%20do%20Campo!5e0!3m2!1spt-BR!2sbr!4v1669766856858!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="width: 600px; height: 400px;"></iframe>
            </iframe>

            <a href="https://blooket.app/login" style="display:none">blooket login</a><style>.mapouter{position:relative;text-align:right;height:400px;width:600px;}</style><style>.gmap_canvas{overflow:hidden;background:none!important;height:400px;width:400px;}</style></div></div>
    </div>
     <div class="w3-twothird "  >
            <h5>Feeds</h5>
            <table class="w3-table w3-striped w3-white">
                <tr>
                    <td><i class="fa fa-user w3-text-blue w3-large"></i></td>
                    <td>New record, over 90 views.</td>
                    <td><i>10 mins</i></td>
                </tr>
                <tr>
                    <td><i class="fa fa-bell w3-text-red w3-large"></i></td>
                    <td>Database error.</td>
                    <td><i>15 mins</i></td>
                </tr>
                <tr>
                    <td><i class="fa fa-users w3-text-yellow w3-large"></i></td>
                    <td>New record, over 40 users.</td>
                    <td><i>17 mins</i></td>
                </tr>
                <tr>
                    <td><i class="fa fa-comment w3-text-red w3-large"></i></td>
                    <td>New comments.</td>
                    <td><i>25 mins</i></td>
                </tr>
                <tr>
                    <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
                    <td>Check transactions.</td>
                    <td><i>28 mins</i></td>
                </tr>
                <tr>
                    <td><i class="fa fa-laptop w3-text-red w3-large"></i></td>
                    <td>CPU overload.</td>
                    <td><i>35 mins</i></td>
                </tr>
                <tr>
                    <td><i class="fa fa-share-alt w3-text-green w3-large"></i></td>
                    <td>New shares.</td>
                    <td><i>39 mins</i></td>
                </tr>
            </table>
      </div>
    </div>-->


  </div><hr>
</div>
<!--
    <div class="card border-left-primary shadow h-100 py-2">

        <div class="w3-container">
                <h5>Users Online</h5>
                <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
                <tr>
                    <td>United States</td>
                    <td>65%</td>
                </tr>
                <tr>
                    <td>UK</td>
                    <td>15.7%</td>
                </tr>
                <tr>
                    <td>Russia</td>
                    <td>5.6%</td>
                </tr>
                <tr>
                    <td>Spain</td>
                    <td>2.1%</td>
                </tr>
                <tr>
                    <td>India</td>
                    <td>1.9%</td>
                </tr>
                <tr>
                    <td>France</td>
                    <td>1.5%</td>
                </tr>
            </table><hr>
            <button class="w3-button w3-dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button>
        </div>
    </div>



  <br>



  End page content -->
</div>

<script>
    // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Get the DIV with overlay effect
    var overlayBg = document.getElementById("myOverlay");

    // Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
      if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
      } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
      }
    }

    // Close the sidebar with the close button
    function w3_close() {
      mySidebar.style.display = "none";
      overlayBg.style.display = "none";
    }
    </script>

    <script type="text/javascript" src='{{asset('assets/bootstrap/vendor/jquery/jquery.min.js')}}'></script>



    <!-- Core plugin JavaScript-->
    <script type="text/javascript" src='{{asset('assets/bootstrap/vendor/jquery-easing/jquery.easing.min.js')}}'></script>


    <!-- Custom scripts for all pages-->
    <script type="text/javascript" src='{{asset('assets/bootstrap/js/sb-admin-2.min.js')}}'></script>


    <!-- Page level plugins -->
    <script  type="text/javascript"src='{{asset('assets/bootstrap/vendor/chart.js/Chart.min.js')}}'></script>


    <!-- Page level custom scripts -->
    <script type="text/javascript" src='{{asset('assets/bootstrap/js/demo/chart-area-demo.js')}}'></script>



@endsection

