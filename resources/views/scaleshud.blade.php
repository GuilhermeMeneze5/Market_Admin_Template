@extends('layouts.app')

@section('content')

    <head>
        <meta charset='utf-8' />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/choices.css') }}">
        <link href='{{ asset('assets/fullcalendar/lib/main.css') }}' rel='stylesheet' />
        <script src='{{ asset('assets/fullcalendar/lib/main.js') }}'></script>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var initialTimeZone = 'local';
                var timeZoneSelectorEl = document.getElementById('time-zone-selector');
                var loadingEl = document.getElementById('loading');
                var calendarEl = document.getElementById('calendar');
                var calendarE1 = document.getElementById('LIST');
                var LIST = new FullCalendar.Calendar(calendarE1, {
                    headerToolbar: false,
                    initialView: 'listWeek',
                    events: [

                    @foreach ($events as $event)
                        {
                            title: '{{ $event->name_event }}',
                            start: '{{ $event->start }}',
                            id:'{{$event->id}}'
                        },
                    @endforeach

                    ]
                            });
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prevYear,prev,next,today',
                        center: 'title',
                        right: 'dayGridMonth,dayGridWeek,dayGridDay'
                    },


                   // eventClick: function(arg) {if (confirm('Are you sure you want to delete this event?')) {arg.event.remove()}},

                   //eventClick: function(event) {    return false;},




                    themeSystem: 'bootstrap5',
                    dayMaxEvents: true,
                    navLinks: true, // can click day/week names to navigate views
                    editable: true,
                    selectable: true,
                    dayMaxEvents: true, // allow "more" link when too many events

                    events: [

                        @foreach ($events as $event)
                            {
                                title: '{{ $event->name_event }}',
                                start: '{{ $event->start }}'
                            },
                        @endforeach

                    ]
                });

                LIST.render();
                calendar.render();

                FullCalendar.requestJson('GET', 'php/get-time-zones.php', {}, function(timeZones) {

                    timeZones.forEach(function(timeZone) {
                        var optionEl;

                        if (timeZone !== 'UTC') { // UTC is already in the list
                            optionEl = document.createElement('option');
                            optionEl.value = timeZone;
                            optionEl.innerText = timeZone;
                            timeZoneSelectorEl.appendChild(optionEl);
                        }
                    });
                }, function() {
                    // TODO: handle error
                });


            });
        </script>




    </head>

    <body class="w3-light-grey">

        <!-- Side Navigation -->

        <nav class="w3-sidebar w3-bar-block w3-collapse w3-white w3-animate-left w3-card" style="z-index:3;width:320px;"
            id="mySidebar">
            <div id='wrap'>
                <div id='external-events'>
                    <h4>Events</h4>
                    <div id='external-events-list'>
                    </div>
                    <p>
                        <!-- <input type='checkbox' id='drop-remove' /> -->
                        <!--<label for='drop-remove'>remove after drop</label>-->
                    </p>
                </div>
                <a href="javascript:void(0)"
                    class="w3-margin-right w3-bar-item w3-button w3-dark-grey w3-button w3-hover-black w3-left-align"
                    onclick="document.getElementById('id01').style.display='block'"><i class="w3-padding fas fa-pen"></i>
                    <b>New Event</b> </a>

            </div>

           <div id='LIST'  ></div>


            <a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu"
                class="w3-bar-item w3-button w3-hide-large w3-large "><i class="fas fa-times w3-margin-right"></i><b>Close
                </b></a>

        </nav>

        <!-- Modal that pops up when you click over "event"
        <script>
            // Get the modal

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target = modal) {
                modal.style.display = "none";
              }
            };
        </script>-->



        <!-- Modal that pops up when you click on "New Message" -->
        <div id="id01" class="w3-modal" style="z-index:4">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-padding w3-red">
                    <span onclick="document.getElementById('id01').style.display='none'"
                        class="w3-button w3-red w3-right w3-xxlarge">X</span>
                    <h2>ADD NEW EVENT</h2>
                </div>
                <div class="w3-panel">
                    <form action="{{ route('/create-event') }}" method="post">
                        @csrf
                        <p> ADD NEW EVENT</P>
                        <div class="w3-section">
                            <div class="w3-panel">
                                <label>EVENT NAME</label>
                                <input name="name_event" id="name_event" class="w3-input w3-border w3-margin-bottom"
                                    type="text" required>

                                <div>
                                    <label>START</label>
                                    <table class="w3-table w3-white">
                                        <tr>
                                            <td><input class="w3-input w3-border w3-margin-bottom" type="time"
                                                    id="hr_start" name="hr_start" required></td>
                                            <td><input class="w3-input w3-border w3-margin-bottom" type="date"
                                                    id="day_start" name="day_start" required></td>
                                        </tr>
                                    </table>
                                    <label>END</label>
                                    <table class="w3-table w3-white">
                                        <tr>
                                            <td><input class="w3-input w3-border w3-margin-bottom" type="time"
                                                    id="hr_end" name="hr_end" required></td>
                                            <td><input class="w3-input w3-border w3-margin-bottom" type="date"
                                                    id="day_end" name="day_end" required></td>
                                        </tr>
                                    </table>
                                </div>

                              <!--  <label>VEHICLE</label>
                                <div col-md-2><select class="w3-input w3-border w3-margin-bottom js-example-basic-multiple"
                                        name="test[]"></select></div>-->



                                <label>OFFICERS</label> {{-- TAGS --}}
                                <select class="w3-input w3-border w3-margin-bottom js-example-basic-multiple" name="users[]"
                                    id="users" multiple="mutiple" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->email }}"> {{ $user->name }}</option>
                                    @endforeach

                                </select>
                                <label>DESTINATION</label>
                                <input name="destination" id="destination" class="w3-input w3-border w3-margin-bottom"
                                    type="text">


                                <label>DESCRIPTION</label>
                                <input name="description" id="description" class="w3-input w3-border w3-margin-bottom"
                                    style="height:150px" placeholder="What's on your mind?">
                                <div class="w3-section">
                                    <button type="submit" class="btn btn-primary btn-block we-right" value="Send">Send <i
                                            class="fa fa-paper-plane"></i></button>
                                </div>
                            </div>

                        </div>
                    </form>
                    <div class="w3-section">
                        <a class="w3-button w3-red w3-righ"onclick="document.getElementById('id01').style.display='none'">Cancel
                            <i class="fa fa-remove"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal that pops up when you click on "New Message" -->
        <div id="id01" class="w3-modal" style="z-index:4">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-padding w3-red">
                    <span onclick="document.getElementById('id01').style.display='none'"
                        class="w3-button w3-red w3-right w3-xxlarge"><i class="fa fa-remove"></i></span>
                    <h2>Agenda</h2>
                </div>
                <div class="w3-panel">
                    <label>To</label>

                    <div class="w3-section">
                        <a class="w3-button w3-red" onclick="document.getElementById('id01').style.display='none'">Cancel
                            <i class="fa fa-remove"></i></a>
                        <a class="w3-button w3-light-grey w3-right"
                            onclick="document.getElementById('id01').style.display='none'">Send  <i
                                class="fa fa-paper-plane"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Overlay effect when opening the side navigation on small screens -->
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
            title="Close Sidemenu" id="myOverlay"></div>


        <!-- Page content -->
        <div class="w3-main" style="margin-left:320px;">
            <div class="w3-container" style="width:auto;margin-right:2%;">
                <br>
                <!-- META -->
                <div id='wrap'>
                    <div id='calendar-wrap' style="
                        display:block;
                        width:100%;

                      }">
                        <div id='calendar' style="
                            width : auto;
                            height: auto;
                            "

                          > </div> <!-- #EDITAR PARA CLIQUE DUPLO -->
                    </div>
                </div>
            </div>
            <i class="fas fa-reply w3-button w3-hide-large w3-xlarge w3-margin-left w3-margin-top"
                onclick="w3_open()"></i>
            <a href="javascript:void(0)" class="w3-hide-large w3-red w3-button w3-right w3-margin-top w3-margin-right"
                onclick="document.getElementById('id01').style.display='block'"><i class="fas fa-pen"></i></a>

        </div>
        @foreach ($events as $event)
            <div id="ids{{ $event->id }}" class="modal" >
                <span onclick="document.getElementById('ids{{ $event->id }}').modal.style.display='none'" class="close" title="Close Modal">Click anywhere to contnus</span>
                <div class="modal-content">
                <div class="container">

                    <h1>Delete Account "{{ $event->id }}"</h1>

                    <p>Are you sure you want to delete your account?</p>

                    <div class="clearfix">
                    <button type="button" onclick="document.getElementById('ids{{ $event->id }}').modal.style.display='none'" class="cancelbtn">Cancel</button>
                    <button type="button" onclick="document.getElementById('ids{{ $event->id }}').modal.style.display='none'" class="deletebtn">Delete</button>
                    </div>
                    Click to close
                </div>
            </div>
            </div>
        @endforeach

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
        </script>

        <script>
            var openTab = document.getElementById("firstTab");
            openTab.click();
            //tag
            $('.js-example-basic-multiple').select2({


            });
        </script>


        </div>
    @endsection
