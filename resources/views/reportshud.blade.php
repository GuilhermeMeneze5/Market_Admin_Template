@extends('layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">


    <!-- Custom styles for this template-->
    <link rel="stylesheet" type="text/css" href="{{asset('asset/bootstrap/vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/bootstrap/css/w3.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/bootstrap/css/googleapis.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/bootstrap/css/sb-admin-2.min.css')}}">
    <meta charset='utf-8' />
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/choices.css')}}">




        <!-- Custom styles for this template
    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    .card:hover {

  border: 5px solid #d3d3d3;
}
    </style>-->

</head>

<style>
</style>
<body>
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h3><b></i>Reports</b></h3>
  </header>

<!-- !PAGE CONTENT! -->

<div class="w3-row-padding w3-margin-bottom">
    <div class="row">

        <!--EVENTS PROGRAMED TODAY -->
        
        <div class="col-xl-3 col-md-6 mb-4" style="color:#f8f9fc;border-radius:10px;">
        <a href="{{ route('/report/users/list-all-users') }}">
            <div class="border-left-primary shadow card h-100 py-2" style="background-color:darkgray;">
                <table>
                    <td>&nbsp;&nbsp;&nbsp;<i class="fas fa-clipboard-check	fa-2x text-gray-300" style="color: #f8f9fc;"></i></td>
                    <td><h3>&nbsp;<strong>List all users</strong></h3></td>
                </table>
                    <table style="text-align: center;">
                    
                        <tr>
                            <td><h3>Verify all users registered</h3></td>
                            
                        </tr>
                    </table>
            </div>
            </a>
        </div>

        <!--ALERTS-->
        <div class="col-xl-3 col-md-6 mb-4" style="color:#f8f9fc;border-radius:10px;">
        <a href="{{ route('/report/scales/list-all-events') }}">
            <div class="border-left-primary shadow card h-100 py-2" style="background-color:darkgray;">
                <table>
                    <td>&nbsp;&nbsp;&nbsp;<i class="fas fa-clipboard-check	fa-2x text-gray-300" style="color: #f8f9fc;"></i></td>
                    <td><h3>&nbsp;<strong>List all Events</strong></h3></td>
                </table>
                    <table style="text-align: center;">
                    
                        <tr>
                            <td><h3>Verify all events registered</h3></td>
                            
                        </tr>
                    </table>
            </div>
            </a>
        </div>

        <!--USERS IN ACTIVITY (TODAY )-->
        <div class="col-xl-3 col-md-6 mb-4" style="color:#f8f9fc;border-radius:10px;">
        <a href="{{ route('/report/console/list-all-logs') }}">
            <div class="border-left-primary shadow card h-100 py-2" style="background-color:darkgray;">
                <table>
                    <td>&nbsp;&nbsp;&nbsp;<i class="fas fa-clipboard-check	fa-2x text-gray-300" style="color: #f8f9fc;"></i></td>
                    <td><h3>&nbsp;<strong>List all data</strong></h3></td>
                </table>
                    <table style="text-align: center;">
                    
                        <tr>
                            <td><h3>Verify all data </h3></td>
                        </tr>
                    </table>
            </div>
            </a>
        </div>

   
     
     
        

</div>
</div>
</body>


@endsection
