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
    <h3><b></i>Settings</b></h3>
  </header>

<!-- !PAGE CONTENT! -->

<div class="w3-row-padding w3-margin-bottom">
    <div class="row">
        <div class="col-lg-3 col-6">
        
        <div class="small-box bg-info">
        <div class="inner">
        <h3>150</h3>
        <p>New Orders</p>
        </div>
        <div class="icon">
        <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        
        <div class="col-lg-3 col-6">
        
        <div class="small-box bg-success">
        <div class="inner">
        <h3>53<sup style="font-size: 20px">%</sup></h3>
        <p>Bounce Rate</p>
        </div>
        <div class="icon">
        <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        
        <div class="col-lg-3 col-6">
        
        <div class="small-box bg-warning">
        <div class="inner">
        <h3>44</h3>
        <p>User Registrations</p>
        </div>
        <div class="icon">
        <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        
        <div class="col-lg-3 col-6">
        
        <div class="small-box bg-danger">
        <div class="inner">
        <h3>65</h3>
        <p>Unique Visitors</p>
        </div>
        <div class="icon">
        <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        
        </div>  
     
        

</div>
</div>
</body>


@endsection
