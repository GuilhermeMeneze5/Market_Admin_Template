@extends('layouts.app')

@section('content')
    <head>
        <title>W3.CSS Template</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
        <!--@######### ADICIONAR ########-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/cloudtables/datatables.min.css') }}">
        <script src='{{asset('assets/cloudtables/jQuery-3.6.0/jquery-3.6.0.min.js')}}'></script>
        <script src='{{asset('assets/cloudtables/datatables.min.js')}}'></script>
        <!--@############################-->


        <style>
            html,
            body,
            h1,
            h2,
            h3,
            h4,
            h5 {
                font-family: "Raleway", sans-serif
            }
        </style>
    </head>

    <body>

        <!-- Side Navigation -->
        <nav class="w3-sidebar w3-bar-block w3-collapse w3-white w3-animate-left w3-card" style="z-index:3;width:320px;"
            id="mySidebar">
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey"
                onclick="openMail('Register');w3_close();"><i class="fa fa-user test w3-margin-right"></i>Users</a></a>
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey"
                onclick="openMail('Groups');w3_close();"><i class="fa fa-users test w3-margin-right"></i>Groups</a></a>

            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey"
                onclick="openMail('Work');w3_close();"><i class="fas fa-briefcase w3-margin-right"></i>Working day</a>
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey"
                onclick="openMail('Permitions');w3_close();"><i class="fa fa-key w3-margin-right"></i>Permitions</a>

            <a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu"
                class="w3-bar-item w3-button test w3-hide-large w3-large">Close <i class="fa fa-remove"></i></a>

            <a id="myBtn" onclick="myFunc('Demo1')"></a>
            <div id="Demo1" class="w3-hide w3-animate-left">

        </nav>


        <!-- Overlay effect when opening the side navigation on small screens -->
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
            title="Close Sidemenu" id="myOverlay"></div>

        <!-- Page content -->
        <div class="w3-main" style="margin-left:320px;">
            <table style="margin-left:80%;">
                <td class="w3-margin-left w3-margin-right" ><i class="fas fa-reply w3-button w3-hide-large w3-xlarge w3-margin-left  w3-margin-botom" onclick="w3_open()"></i></td>

            </table>


            <div id="Register" class="w3-container person">

                <div>
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="w3-container">
                                <h5>Username</h5>
                                <table id="myTable1">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NAME</th>
                                            <th>EDIT</th>
                                            <th>BLOCK</th>
                                            <th>DELETE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(empty($users))
                                        <p>No register found please, register a new user to continue</p>
                                            @else
                                            @foreach ($users as $user)

                                            <tr class="alert">
                                                <td value="777">{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td style="display: fix; justify-content: center; align-items: center;"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-pen"  style="color:gray;"></i></a></td>
                                                <td style=" display: fix;justify-content: center; align-items: center;"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-ban"  style="color:gray;"></i></a></td>
                                                <td style=" justify-content: center; align-items: center;"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-trash"  style="color:gray;"></i></a></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                    </tbody>
                                </table>
                                
                                <br>
                                <a href="javascript:void(0)" class="text-center"> <button class="w3-button w3-dark-grey" onclick="document.getElementById('id01').style.display='block'">Add New officer  <i class="fa fa-user-plus"></i></button></a>


                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div id="Groups" class="w3-container person">
                <div>
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="w3-container">
                                <h5>Groups</h5>
                               
                                <table id="myTable2">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NAME</th>
                                            <th>DESC</th>
                                            <th>EDIT</th>
                                            <th>DELET</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(empty($groups))
                                        <p>No register found please, register a new user to continue</p>
                                            @else
                                            @foreach ($groups as $group)

                                            <tr class="alert">
                                                <td value="777">{{$group->id}}</td>
                                                <td>{{$group->name}}</td>
                                                <td>{{$group->description}}</td>
                                                <td style="display: fix; justify-content: center; align-items: center;"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-pen"  style="color:gray;"></i></a></td>
                                                <td style=" justify-content: center; align-items: center;"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-trash"  style="color:gray;"></i></a></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                    </tbody>
                                </table>
                                <br>
                                <a href="javascript:void(0)" class="text-center"> <button class="w3-button w3-dark-grey" onclick="document.getElementById('id02').style.display='block'">Add New Group  <i class="fa fa-user-plus"></i></button></a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="Work" class="w3-container person">
                <div>
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="w3-container">
                                <h5>Working Day</h5>
                                    <table id="myTable3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAME</th>
                                                <th>DESC</th>
                                                <th>EDIT</th>
                                                <th>DELET</th>    
    
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(empty($charges))
                                            <p>No register found please, register a new user to continue</p>
                                                @else
                                                @foreach ($charges as $charge)
    
                                                <tr class="alert">
                                                    <td value="777">{{$charge->id}}</td>
                                                    <td>{{$charge->name_workload}}</td>
                                                    <td>{{$charge->description_workload}}</td>
                                                    <td style="display: fix; justify-content: center; align-items: center;"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-pen"  style="color:gray;"></i></a></td>
                                                    <td style=" justify-content: center; align-items: center;"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-trash"  style="color:gray;"></i></a></td>
                                                </tr>
                                                @endforeach
                                                @endif
                                        </tbody>
                                    </table>
                                    <br>
                                <a href="javascript:void(0)" class="text-center"> <button class="w3-button w3-dark-grey" onclick="document.getElementById('id03').style.display='block'">Add New Workload  <i class="fa fa-user-plus"></i></button></a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="Permitions" class="w3-container person">
                <div>
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="w3-container">
                                <h5>Permitions</h5>
                                <table id="myTable4">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NAME</th>
                                            <th>DESC</th>
                                            <th>EDIT</th>
                                            <th>DELET</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(empty($rules))
                                        <p>No register found please, register a new user to continue</p>
                                            @else
                                            @foreach ($rules as $rule)
                                            <tr class="alert">
                                                <td value="777">{{$rule->id}}</td>
                                                <td>{{$rule->role_name}}</td>
                                                <td>{{$rule->role_description}}</td>
                                                <td style="display: fix; justify-content: center; align-items: center;"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-pen"  style="color:gray;"></i></a></td>
                                                <td style=" justify-content: center; align-items: center;"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-trash"  style="color:gray;"></i></a></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                    </tbody>
                                </table><br>
                                <a href="javascript:void(0)" class="text-center"> <button class="w3-button w3-dark-grey" onclick="document.getElementById('id04').style.display='block'">Add New Permition  <i class="fa fa-user-plus"></i></button></a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
         <!-- Modal that pops up when you click on "New USER" -->
        <div id="id01" class="w3-modal" style="z-index:4;Position: absolute;">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-padding w3-red">
                    <span
                        onclick="document.getElementById('id01').style.display='none'"class="w3-button w3-red w3-right "><i
                            class="fa fa-remove">X</i></span>
                    <h2>New user</h2>
                </div>

                <div class="w3-panel">
                    <div class="card">
                        <div class="card-body register-card-body">
                            <p class="login-box-msg">Register a new membership</p>

                            <form method="post" action="{{ route('/create-user') }}">
                                @csrf

                                <div class="input-group mb-3">
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" placeholder="Full name">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><span class="fas fa-user"></span></div>
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Retype password">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-8">
                                        <div class="icheck-primary">
                                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                            <label for="agreeTerms">
                                                I agree to the <a href="#">terms</a>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>

                            <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
                        </div>
                        <!-- /.form-box -->
                    </div><!-- /.card -->

                </div>
            </div>
        </div>
         <!-- Modal that pops up when you click on "New GROUP" -->

        <div id="id02" class="w3-modal" style="z-index:4;Position: absolute;">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-padding w3-red">
                    <span
                        onclick="document.getElementById('id02').style.display='none'"class="w3-button w3-red w3-right "><i
                            class="fa fa-remove">X</i></span>
                    <h2>New Group</h2>
                </div>

                <div class="w3-panel">
                    <div class="card">
                        <form action="{{ route('/create-group') }}" method="post">
                            @csrf
                            <label>Group Name</label>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" name='name_group' id='name_group'
                                required>
                            <label>Description</label>
                                <input class="w3-input w3-border w3-margin-bottom" type="text" name='desc_group' id='desc_group'
                                    required>
                                    <label>Work Layout</label>
                                    <select class="w3-input w3-border w3-margin-bottom js-example-basic-multiple" name="charge_id"
                                        id="to" required>
                                        <option value="charges" disabled>-- Select Workload ---</option>
                                       @foreach ($charges as $charge)
                                       <option value="{{ $charge->id }}"> {{ $charge->name_workload }} - [{{ $charge->description_workload }}]</option>
                                   @endforeach
                                    </select>
                            <label>Select permition:</label>
                                    <select class="w3-input w3-border w3-margin-bottom js-example-basic-multiple" name="permition_id"
                                        id="to" required>

                                        <option value="permitions" disabled>-- Select Officers ---</option>
                                        @foreach ($rules as $rule)
                                            <option value="{{ $rule->id }}"> {{ $rule->role_name}} - [{{ $rule->role_description }}]</option>
                                        @endforeach
                                    </select>
                            <button type="submit" class="btn btn-primary btn-block we-right" value="Send">Send <i
                                class="fa fa-paper-plane"></i></button>
                        </form>
                    </div><!-- /.card -->

                </div>
            </div>
        </div>
                 <!-- Modal that pops up when you click on "New WORK CHARGE" -->



        <div id="id03" class="w3-modal" style="z-index:4;Position: absolute;">

            <div class="w3-modal-content w3-animate-zoom">
                <form action="{{ route('/create-charge') }}" method="post">
                <div class="w3-container w3-padding w3-red">
                    <span
                        onclick="document.getElementById('id03').style.display='none'"class="w3-button w3-red w3-right "><i
                            class="fa fa-remove">X</i></span>
                    <h2>New Work Charge</h2>
                </div>
                    <div class="w3-section">
                        <div class="w3-panel">
                            <label>WORKLOAD NAME</label>
                            <input name="name_workload" id="name_workload" class="w3-input w3-border w3-margin-bottom"
                                type="text" required>
                            <label>WORKLOAD DESCRIPTION</label>
                            <input name="description_workload" id="description_workload" class="w3-input w3-border w3-margin-bottom"
                                    type="text" required>
                            <div>

                                <table class="w3-table w3-white">
                                    <TR>
                                        <td><label>START</label></td>
                                        <td><label>END</label></td>
                                        <td><label>total worked by day</label></td>

                                    </TR>
                                    <tr>
                                        <td><input class="w3-input w3-border w3-margin-bottom" type="time"
                                                id="hrIni" name="hrIni" required></td>
                                        <td><input class="w3-input w3-border w3-margin-bottom" type="time"
                                                    id="hrF" name="hrF" required></td>
                                        <td><span><p id="hrT">00:00</p></span></td>
                                    </tr>

                                    <script  type="text/javascript" src='{{ asset('assets/momentjs/moment.min.js') }}'></script>

                                  <script>
                                    setInterval(() => {

                                        var hrIni  = document.getElementById("hrIni").value;;
                                        var hrF = document.getElementById("hrF").value;;

                                        var ms = moment(hrF,"HH:mm").diff(moment(hrIni,"HH:mm"));

                                        var d = moment.duration(ms);
                                        var s = Math.floor(d.asHours()) + "h" + moment.utc(ms).format(" mm") +"m";

                                        document.getElementById("hrT").textContent = s;
                                        document.getElementById("hrT2").value = s;
                                        console.log(s);
                                        console.log(hrT);

                                    }, 1000);

                                    </script>
                                </table>
                                 <!--**SCRIPT TO CHOSE PERIOD**- -->
                                           <!-- SET BREAK TIME -->
                                           <div>
                                            &nbsp;&nbsp;&nbsp;<input type="checkbox" class="checkbox" value="1" required>&nbsp;First Break
                                            <div class="div_box">
                                                <div class = 'card '>
                                                    <table class="w3-table w3-white">
                                                        <TR>
                                                            <td><label>START</label></td>
                                                            <td><label>END</label></td>
                                                            <td><label>total worked by day</label></td>

                                                        </TR>
                                                        <tr>
                                                            <td><input class="w3-input w3-border w3-margin-bottom" type="time"
                                                                    id="IniBreak1" name="IniBreak1" required></td>
                                                            <td><input class="w3-input w3-border w3-margin-bottom" type="time"
                                                                        id="fimBreak1" name="fimBreak1" required></td>
                                                            <td><span><p id="totalBreak1">00:00</p></span></td>
                                                        </tr>
                                                    </table>
                                                    <script>
                                                        setInterval(() => {
                                                            var IniBreak1  = document.getElementById("IniBreak1").value;;
                                                            var fimBreak1 = document.getElementById("fimBreak1").value;;
                                                            var ms2 = moment(fimBreak1,"HH:mm").diff(moment(IniBreak1,"HH:mm"));
                                                            var d2 = moment.duration(ms2);
                                                            var s2 = Math.floor(d2.asHours()) + "h" + moment.utc(ms2).format(" mm") +"m";
                                                            document.getElementById("totalBreak1").textContent = s2;
                                                            document.getElementById("totalBreak10").VALUE = s2;
                                                       }, 1000);
                                                    </script>
                                                </div>
                                                <hr>
                                                &nbsp;&nbsp;<input type="checkbox" class="checkbox">&nbsp;Second Break
                                                <div class="div_box2">
                                                  <div class = 'card '>
                                                    <table class="w3-table w3-white">
                                                        <TR>
                                                            <td><label>START</label></td>
                                                            <td><label>END</label></td>
                                                            <td><label>total worked by day</label></td>

                                                        </TR>
                                                        <tr>
                                                            <td><input class="w3-input w3-border w3-margin-bottom" type="time"
                                                                    id="IniBreak2" name="IniBreak2" ></td>
                                                            <td><input class="w3-input w3-border w3-margin-bottom" type="time"
                                                                        id="fimBreak2" name="fimBreak2" ></td>
                                                            <td><span><p id="totalBreak2">00:00</p></span></td>
                                                        </tr>
                                                    </table>
                                                    <script>
                                                        setInterval(() => {
                                                            var IniBreak2  = document.getElementById("IniBreak2").value;;
                                                            var fimBreak2 = document.getElementById("fimBreak2").value;;
                                                            var ms3 = moment(fimBreak2,"HH:mm").diff(moment(IniBreak2,"HH:mm"));
                                                            var d3 = moment.duration(ms3);
                                                            var s3 = Math.floor(d3.asHours()) + "h" + moment.utc(ms3).format(" mm") +"m";
                                                            document.getElementById("totalBreak2").textContent = s3;
                                                        }, 1000);
                                                    </script>
                                                  </div>
                                                  <hr>
                                                 <input type="checkbox" class="checkbox" >&nbsp;Tirth Break

                                                  <div class="div_box3">

                                                    <div class = 'card '>
                                                        <table class="w3-table w3-white">
                                                            <TR>
                                                                <td><label>START</label></td>
                                                                <td><label>END</label></td>
                                                                <td><label>total worked by day</label></td>

                                                            </TR>

                                                            <tr>
                                                                <td><input class="w3-input w3-border w3-margin-bottom" type="time"
                                                                        id="IniBreak3" name="IniBreak3" ></td>
                                                                <td><input class="w3-input w3-border w3-margin-bottom" type="time"
                                                                            id="fimBreak3" name="fimBreak3" ''></td>
                                                                <td><span><p id="totalBreak3">00:00</p></span></td>
                                                            </tr>

                                                        </table>
                                                        <script>
                                                            setInterval(() => {
                                                                var IniBreak3  = document.getElementById("IniBreak3").value;;
                                                                var fimBreak3 = document.getElementById("fimBreak3").value;;
                                                                var ms4 = moment(fimBreak3,"HH:mm").diff(moment(IniBreak3,"HH:mm"));
                                                                var d4 = moment.duration(ms4);
                                                                var s4 = Math.floor(d4.asHours()) + "h" + moment.utc(ms4).format(" mm") +"m";
                                                                document.getElementById("totalBreak3").textContent = s4;
                                                                document.getElementById("totalBreak30").VALUE = s4.VALUE;


                                                            }, 1000);
                                                        </script>

                                                    </div>
                                                </div>
                                                </div>
                                              </div>
                                              <style>
                                                .div_box {
                                                  padding: 10px;
                                                  display: none;
                                                }

                                                .checkbox:checked + .div_box {
                                                  display: block;
                                                }
                                                  .div_box2 {
                                                  display: none;
                                                }

                                                .checkbox:checked + .div_box2 {
                                                  display: block;
                                                }
                                                  .div_box3 {
                                                  display: none;
                                                }

                                                .checkbox:checked + .div_box3 {
                                                  display: block;
                                                }
                                              </style>
                                        </div>
                                    </div>
                                    <!-- END BREAK TIME-->
                                <script language="JavaScript" type="text/javascript">
                                    function showhidediv(rad){
                                    var rads=document.getElementsByName(rad.name);
                                    document.getElementById('one').style.display=(rads[0].checked)?'block':'none' ;
                                    document.getElementById('two').style.display=(rads[1].checked)?'block':'none' ;
                                    }
                                    </script>
                                    <hr>
                                    <table class="w3-table w3-white">
                                        <TR>
                                            <td><input name="Period" type="radio" value="1" onclick="showhidediv(this);required"/> Regular Period</td>
                                            <td><input name="Period" type="radio" value="2"  onclick="showhidediv(this);"/> Irregular Period</td>
                                        </TR>

                                    </table>
                                    <hr>


                                    <div id="one" class="regular" style="display:none;"  >
                                        <div class="card">
                                        <table class="w3-table w3-white">


                                            <TR>
                                                <td><label>DOM</label></td>
                                                <td><label>SEG</label></td>
                                                <td><label>TER</label></td>
                                                <td><label>QUA</label></td>
                                                <td><label>QUI</label></td>
                                                <td><label>SEX</label></td>
                                                <td><label>SAB</label></td>
                                            </TR>
                                            <tr>
                                                <td><input type="checkbox" id="dom" name="dom" value="1"></td>
                                                <td><input type="checkbox" id="seg" name="seg" value="1"></td>
                                                <td><input type="checkbox" id="ter" name="ter" value="1"></td>
                                                <td><input type="checkbox" id="qua" name="qua" value="1"></td>
                                                <td><input type="checkbox" id="qui" name="qui" value="1"></td>
                                                <td><input type="checkbox" id="sex" name="sex" value="1"></td>
                                                <td><input type="checkbox" id="sab" name="sab" value="1"></td>
                                            </tr>
                                        </table>
                                    </DIV>

                                </div>
                                    <div id="two"  class="Irregular" style="display:none;" >
                                        <DIV class="card">
                                            <table class="w3-table w3-white">
                                                <TR>
                                                    <td><label>Days Worked</label></td>
                                                    <td><label>Days in Vacation</label></td>
                                                </TR>
                                                <tr>
                                                    <td><input type="NUMBER" name="numdaywork" min="0" max="7"></td>
                                                    <td><input type="NUMBER" name="numdayvacation" min="0" max="7"></td>
                                                </tr>
                                            </table>
                                        </DIV>
                                    </div>
                                    <!--END SCRIPT TO CHOSE PERIOD-->
                                    <div class="Periods" style="display:none;" >
                                        <DIV class="card">
                                            <table class="w3-table w3-white">
                                                <TR>
                                                    <td><label>Days Worked</label></td>
                                                    <td><label>Days in Vacation</label></td>
                                                </TR>
                                                <tr>
                                                    <td><input type="number" name="sc_ir_days_work" min="0" max="7"></td>
                                                    <td><input type="number" name="sc_ir_days_vac" min="0" max="7"></td>
                                                </tr>
                                            </table>
                                        </DIV>
                                    </div>
                <div class="Extras" >
                    <DIV class="card">
                        <span>EXTRAS</span>
                        <table class="w3-table w3-white">
                            <TR>
                                <td><label>Tolerance Start</label></td>
                                <td><label>Tolerance Work</label></td>
                            </TR>
                            <tr>
                                <td><input  type="TIME" type="TolerancePoint" name="tolerance_mark"></td>
                                <td><input type="TIME" type="ToleranceWork" name="tolerance_work"></td>
                            </tr>
                        </table>
                    </DIV>
                </div>
                <div class="w3-panel">
                    <div class="card">

                            @csrf
                            <button type="submit" class="btn btn-primary btn-block we-right" value="Send">Resume <i
                                class="fa fa-paper-plane"></i></button>
        </form>
                    </div><!-- /.card -->

                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Modal that pops up when you click on "New PERMITION" -->

        <div id="id04" class="w3-modal" style="z-index:4;Position: absolute;">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-padding w3-red">
                    <span
                        onclick="document.getElementById('id04').style.display='none'"class="w3-button w3-red w3-right "><i
                            class="fa fa-remove">X</i></span>
                    <h2>New Permition</h2>
                </div>
                <div class="w3-panel">
                    <div class="">
                        <form action="{{ route('/create-permition') }}" method="post">
                            @csrf

                            <label>Access Name</label>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" name='name_access' id='name_access'
                                required>
                            <label>Description</label>
                                <input class="w3-input w3-border w3-margin-bottom" type="text" name='desc_access' id='desc_access'
                                    required>
                            <label>Messages</label>
                            <table class="w3-table w3-white">
                                <TR>
                                    <td><input name="Messages" type="radio" value="1" onclick="showhidediv(this);" required/> Full Access</td>
                                    <td><input name="Messages" type="radio" value="2"  onclick="showhidediv(this);"/> Only view</td>
                                    <td><input name="Messages" type="radio" value="3"  onclick="showhidediv(this);"/> Blocked</td>
                                </TR>
                            </table>
                            <hr>
                            <label>Reports</label>
                            <table class="w3-table w3-white">
                                <TR>
                                    <td><input name="Reports" type="radio" value="1" onclick="showhidediv(this);" required/> Full Access</td>
                                    <td><input name="Reports" type="radio" value="2"  onclick="showhidediv(this);"/> Only view</td>
                                    <td><input name="Reports" type="radio" value="3"  onclick="showhidediv(this);"/> Blocked</td>
                                </TR>
                            </table>
                            <hr>
                            <label>Scales</label>
                            <table class="w3-table w3-white">
                                <TR>
                                    <td><input name="Scales" type="radio" value="1" onclick="showhidediv(this); required" > Full Access</td>
                                    <td><input name="Scales" type="radio" value="2"  onclick="showhidediv(this);" > Only view</td>
                                    <td><input name="Scales" type="radio" value="3"  onclick="showhidediv(this);" /> Blocked</td>
                                </TR>
                            </table>
                            <hr>
                            <label>Officer Menagement</label>
                            <table class="w3-table w3-white">
                                <TR>
                                    <td><input name="Officermen" type="radio" value="1" onclick="showhidediv(this);" required/> Full Access</td>
                                    <td><input name="Officermen" type="radio" value="2"  onclick="showhidediv(this);" required/> Only view</td>
                                    <td><input name="Officermen" type="radio" value="3"  onclick="showhidediv(this);" required/> Blocked</td>
                                </TR>
                            </table>
                            <hr>
                            <label>Register Point</label>
                            <table class="w3-table w3-white">
                                <TR>
                                    <td><input name="Register" type="radio" value="1" onclick="showhidediv(this); " required/> Full Access</td>
                                    <td><input name="Register" type="radio" value="2"  onclick="showhidediv(this);"/> Only view</td>
                                    <td><input name="Register" type="radio" value="3"  onclick="showhidediv(this);"/> Blocked</td>
                                </TR>
                            </table>
                            <hr>
                            <label>Settings</label>
                            <table class="w3-table w3-white">
                                <TR>
                                    <td><input name="Settings" type="radio" value="1" onclick="showhidediv(this);" required/> Full Access</td>
                                    <td><input name="Settings" type="radio" value="2"  onclick="showhidediv(this);"/> Only view</td>
                                    <td><input name="Settings" type="radio" value="3"  onclick="showhidediv(this);"/> Blocked</td>
                                </TR>
                            </table>
                            <hr>
                            <label>Request</label>
                            <table class="w3-table w3-white">
                                <TR>
                                    <td><input name="Request" type="radio" value="1" onclick="showhidediv(this); " required/> Full Access</td>
                                    <td><input name="Request" type="radio" value="2"  onclick="showhidediv(this);"/> Only view</td>
                                    <td><input name="Request" type="radio" value="3"  onclick="showhidediv(this);"/> Blocked</td>
                                </TR>
                            </table>
                            <br>
                                <button type="submit" class="btn btn-primary btn-block we-right" value="Send">Send <i
                                class="fa fa-paper-plane"></i></button>
                        </form>
                    </div><!-- /.card -->

                </div>


                </div>
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

            openMail("Register")
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
            }
        </script>
    <!--@######### ADICIONAR ########-->

      <script>
       $(document).ready(function() {
            $('#myTable1').DataTable();
            $('#myTable2').DataTable();
            $('#myTable3').DataTable();
            $('#myTable4').DataTable();
        });
        </script>
    <!--@#################-->
    </body>
@endsection
