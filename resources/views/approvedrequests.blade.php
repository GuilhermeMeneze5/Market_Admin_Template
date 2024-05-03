@extends('layouts.app')

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
        <style>
            html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
        </style>
    </head>
    <body class="w3-light-grey">

        <!-- Side Navigation -->
        <nav class="w3-sidebar w3-bar-block w3-collapse w3-white w3-animate-left w3-card" style="z-index:3;width:320px;"
            id="mySidebar">
            <a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu"
                class="w3-bar-item w3-button w3-hide-large w3-large "><i class="fas fa-times w3-margin-right"></i><b>Close
                </b></a>

            <a id="myBtn" onclick="myFunc('Demo1')" href="javascript:void(0)" class="w3-bar-item w3-button">


                <i class="fa fa-caret-down w3-margin-left"></i></a>
            <div id="Demo1" class="w3-hide w3-animate-left">


            </div>
        </nav>


        <!-- Overlay effect when opening the side navigation on small screens -->
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
            title="Close Sidemenu" id="myOverlay"></div>

        <!-- Page content -->
        <div class="w3-main" style="margin-left:320px;">
            <i class="fas fa-reply w3-button w3-hide-large w3-xlarge w3-margin-left w3-margin-top" onclick="w3_open()"></i>
            <a href="javascript:void(0)" class="w3-hide-large w3-red w3-button w3-right w3-margin-top w3-margin-right"
                onclick="document.getElementById('id01').style.display='block'"><i class="fas fa-pen"></i></a>
        <div style="background-color: white;min-height: 90vh;">

        </div>
        </div>
        <script>
            var openInbox = document.getElementById("myBtn");
            openInbox.click();

            function w3_open() {
                document.getElementById("mySidebar").style.display = "block";
                document.getElementById("myOverlay").style.display = "block";
            }

            function w3_close() {
                document.getElementById("mySidebar").style.display = "none";
                document.getElementById("myOverlay").style.display = "none";
            }

            function myFunc(id) {
                var x = document.getElementById(id);
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                    x.previousElementSibling.className += " w3-red";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                    x.previousElementSibling.className =
                        x.previousElementSibling.className.replace(" w3-red", "");
                }
            }


            function openMail(personName) {
                var i;
                var x = document.getElementsByClassName("person");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                x = document.getElementsByClassName("test");
                for (i = 0; i < x.length; i++) {
                    x[i].className = x[i].className.replace(" w3-light-grey", "");
                }
                document.getElementById(personName).style.display = "block";
                event.currentTarget.className += " w3-light-grey";
            }
        </script>

        <script>
            var openTab = document.getElementById("firstTab");
            openTab.click();
        </script>
    @endsection
