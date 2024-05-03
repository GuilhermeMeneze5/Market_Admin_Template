@extends('layouts.app')

@section('content')

    <head>
        <title>W3.CSS Template</title>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
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
 <script>
    function obterLocalizacao() {
        if ('geolocation' in navigator) {
            navigator.geolocation.getCurrentPosition(function (position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                exibirEndereco(latitude, longitude);
                exibirDataHora();
            }, function (error) {
                console.error('Erro ao obter a localização: ' + error);
                alert('Ops, não foi possível pegar a localização');
                document.getElementById("LocationID").textContent = 'ERRO AO OBTER A LOCALIZAÇÃO';
                document.getElementById("DateID").textContent = 'ERRO AO OBTER A DATA';
                document.getElementById("TimeDisplay").textContent = 'ERRO AO OBTER A HORA';
            });
        } else {
            alert('Ops, não foi possível pegar a localização');
            document.getElementById("LocationID").textContent = 'ERRO AO OBTER A LOCALIZAÇÃO';
            document.getElementById("DateID").textContent = 'ERRO AO OBTER A DATA';
            document.getElementById("TimeDisplay").textContent = 'ERRO AO OBTER A HORA';
        }
    }

    function exibirEndereco(latitude, longitude) {
        const apiUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                const endereco = data.address;
                const cidade = endereco.city;
                const pais = endereco.country;
                const enderecoCompleto = `${cidade}, ${pais}`;
                document.getElementById("LocationID").textContent = enderecoCompleto;
            })
            .catch(error => {
                console.error('Erro ao converter coordenadas em endereço: ' + error);
                document.getElementById("LocationID").textContent = 'ERRO AO OBTER O ENDEREÇO';
            });
    }

    function exibirDataHora() {
        const agora = new Date();
        const dataHoraFormatada = agora.toLocaleString('pt-BR');
        document.getElementById("dataHora").textContent = dataHoraFormatada;

        const dia = agora.getDate();
        const mes = agora.getMonth() + 1;
        const ano = agora.getFullYear();
        const seg1 = agora.getSeconds();
        const min1 = agora.getMinutes();
        const hour1 = agora.getHours();
        const DataTotal = `${ano}-${mes}-${dia}`;
        const TimeTotal = `${hour1}:${min1}:${seg1}`;
        const Display = `${DataTotal} ${TimeTotal}`;

        document.getElementById("DateID").textContent = DataTotal;
        document.getElementById("TimeDisplay").textContent = TimeTotal;
    }

    // Chame a função para obter a localização e exibir os registros
    obterLocalizacao();
</script>

    </head>

    <div style='display: none;' id="TimeDisplay"></div>
    <body>
        <?php $ix = 0;
        foreach ($entradas as $entrada) {
            $ix++;
        } ?>
        <?php $iy = 0;
        foreach ($saidas as $saida) {
            $iy++;
        } ?>
        <!-- Side Navigation -->
        <nav class="w3-sidebar w3-bar-block w3-collapse w3-white w3-animate-left w3-card" style="z-index:3;width:320px;"
            id="mySidebar">
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey"
                onclick="openMail('Register');w3_close();"><i class="fa fa-clock test w3-margin-right"></i>Register</a></a>
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey"
                onclick="openMail('Delay');w3_close();"><i class="fa fa-hourglass-end  test w3-margin-right"></i>Delay</a>
            </a>
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey"
                onclick="openMail('Settings');w3_close();"><i class="fa fa-wrench test w3-margin-right"></i>Settings</a>
            </a>
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey"
                onclick="openMail('Holiday');w3_close();"><i
                    class="fas fa-umbrella-beach test w3-margin-right"></i>Holiday</a></a>
            <!-- <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail('Docs');w3_close();"><i class="fas fa-file test w3-margin-right"></i>Docs</a>   </a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail('Docs');w3_close();"><i class="fa fa-history test w3-margin-right"></i>Historico</a>    </a>-->



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
            <div id="header" class="card-body " style="margin: right:1opx;">
                <br>
                <table>
                    <td>
                        <h5 class="w3-margin-left">Olá, {{ Auth::user()->name }}</h5>
                    </td>
                    <td class="w3-margin-left w3-margin-right"><i
                            class="fas fa-reply w3-button w3-hide-large w3-xlarge w3-margin-left  w3-margin-botom"
                            onclick="w3_open()"></i></td>

                </table>
                <table>
                    <td><i class="fas fa-map-marker w3-margin-left w3-margin-botom"></i></td>
                    <td>
                        <p>
                        <h6 class="w3-opacity w3-margin-left" id="">     <div id="LocationID"></div>
                        </h6>
                        </p>
                    </td>
                    <td><i class="fa fa-clock w3-margin-left  w3-margin-botom"></i></td>
                    <td>

                        <p>
                        <!-- ## Padrão BR-->
                            <h6 class="w3-opacity w3-margin-left w3" id=""><div id="dataHora"></div></H6>
                        <!-- ## Padrão EUA-->
                        <!-- <h6 class="w3-opacity w3-margin-left w3" id="DateID">Date-time</h6>-->
                        </p>
                    </td>
                </table>
                <hr>

            </div>


            <div id="Register" class="w3-container person">
                <div>
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <table>
                                        <td>
                                            <div
                                                class="text-xs font-weight-bold text-primary text-uppercase mb-1 w3-margin-right   ">
                                                Registers (Today)</div>
                                        </td>

                                        <td>
                                            <div class="col-auto">
                                                <i class="fas fa-clock fa-2x text-gray-300 w3-margin-left"
                                                    style="color: #d3d3d3"></i>
                                            </div>
                                        </td>
                                    </table>

                                    <hr>
                                    @if ($ix == $iy)
                                        <p> no registers today</p>
                                    @else
                                        <h1>{{ $UE->created_at }}</h1>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div>
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <table>
                                        <td>
                                            <div
                                                class="text-xs font-weight-bold text-primary text-uppercase mb-1 w3-margin-right   ">
                                                Hours Worked (Today)</div>
                                        </td>

                                        <td>
                                            <div class="col-auto">
                                            </div>
                                        </td>
                                    </table>

                                    <hr>
                                    @if ($ix == $iy)
                                        <p> no registers today</p>
                                    @else
                                        <h1 id=""><div id="TimeDisplay"></div></h1>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>


                @if ($ix == $iy)
                    <form method="POST" action="{{ route('/create-start') }}">
                        @csrf
                        <input value="{{ Auth::user()->id }}" name="user_id" id="user_id" style="display:none;" required>
                        <!--<p id="btn_send_register">btn_send_register</p> -->
                        <button type="submit" class="btn btn-primary btn-block we-right" value="Send">START <i
                                class="fa fa-paper-plane"></i></button>
                    </form>
                @else
                    <form method="POST" action="{{ route('/create-end') }}">
                        @csrf
                        <input value="{{ Auth::user()->id }}" name="user_id" id="user_id" style="display:none;" required>
                        <!--<p id="btn_send_register_end">btn_send_register_end</p>-->
                        <button type="submit" class="btn btn-primary btn-block we-right" value="Send">END <i
                                class="fa fa-paper-plane"></i></button>
            </div>
            </form>
            @endif
        </div>

        <div id="Delay" class="w3-container person">
            <div>
                <form>
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <table>
                                        <td>
                                            <div
                                                class="text-xs font-weight-bold text-primary text-uppercase mb-1 w3-margin-right   ">
                                                Delay</div>
                                        </td>

                                        <td>
                                            <div class="col-auto">
                                                <i class="fas fa-hourglass-end fa-2x text-gray-300 w3-margin-left"
                                                    style="color: #d3d3d3"></i>
                                            </div>
                                        </td>
                                    </table>
                                    <hr>
                                    <div>
                                        <form action="{{ route('/create-start') }}" method="post">
                                            @csrf
                                            <input disabled value="{{ Auth::user()->id }}" name="user_name"
                                                id="user_name" style="display:none;" required>
                                            <input class="w3-input w3-border w3-margin-bottom" type="date"
                                                id="day_start" name="day_start" required="">
                                        </form><br>
                                        <form action="{{ route('/create-end') }} " method="post">
                                            @csrf
                                            <input disabled value="{{ Auth::user()->id }}" name="user_name"
                                                id="user_name" style="display:none;"required>
                                            <input class="w3-input w3-border w3-margin-bottom" type="time"
                                                id="hr_start" name="hr_start" required="">
                                        </form>
                                    </div>
                                    <P> This register will need be approved</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block we-right" value="Send">Send <i
                            class="fa fa-paper-plane"></i></button>

            </div>
            </form>

        </div>

        <div id="Settings" class="w3-container person">
            <div>
                <form>
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <table>
                                        <td>
                                            <div
                                                class="text-xs font-weight-bold text-primary text-uppercase mb-1 w3-margin-right   ">
                                                Settings</div>
                                        </td>

                                        <td>
                                            <div class="col-auto">
                                                <i class="fas fa-wrench fa-2x text-gray-300 w3-margin-left"
                                                    style="color: #d3d3d3"></i>
                                            </div>
                                        </td>
                                    </table>
                                    <hr>
                                    <div>
                                        <label>Type</label>
                                        <select class="w3-input w3-border w3-margin-bottom js-example-basic-multiple"
                                            name="TYPE" id="TYPE" required="">
                                            <option value=""> Ponto em atraso</option>
                                            <option value=""> Atestado medico</option>
                                            <option value=""> Sobre Aviso</option>
                                            <option value=""> Compensação em horas</option>
                                        </select>
                                        <table>

                                            <tr> <label>Day</label></tr>
                                            <tr> <input class="w3-input w3-border w3-margin-bottom" type="date"
                                                    id="day_start" name="day_start" required=""></tr>

                                            <tr> <label>Hour</label></tr>
                                            <tr> <input class="w3-input w3-border w3-margin-bottom" type="time"
                                                    id="hr_start" name="hr_start" required=""></tr>
                                            <tr>
                                                <td> <label class="w3-margin-right">All Day</label></td>
                                                <td> <input class="w3-input w3-margin-right w3-margin-botom"
                                                        type="checkbox" id="allday" name="allday" required="">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <P> This register will need be approved</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block we-right" value="Send">Send <i
                            class="fa fa-paper-plane"></i></button>

            </div>
            </form>
        </div>

        <div id="Holiday" class="w3-container person">
            <div>
                <form>
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <table>
                                        <td>
                                            <div
                                                class="text-xs font-weight-bold text-primary text-uppercase mb-1 w3-margin-right   ">
                                                Holiday</div>
                                        </td>
                                        <td>
                                            <div class="col-auto">
                                                <i class="fas fa-umbrella-beach fa-2x text-gray-300 w3-margin-left"
                                                    style="color: #d3d3d3"></i>
                                            </div>
                                        </td>
                                    </table>
                                    <hr>
                                    <div>
                                        <label>Day Start</label>
                                        <input class="w3-input w3-border w3-margin-bottom" type="date" id="day_start"
                                            name="day_start" required="">

                                        <label>Day End</label>
                                        <input class="w3-input w3-border w3-margin-bottom" type="date" id="day_end"
                                            name="day_end" required="">

                                    </div>
                                    <P> This register will need be approved</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block we-right" value="Send">Send <i
                            class="fa fa-paper-plane"></i></button>

            </div>
            <form>
        </div>

        <!--  #DOCS
    <div id="Docs" class="w3-container person">
        <br>
        <h5 class="w3-opacity">DOCS</h5>
        <h4><i class="fa fa-clock-o"></i> From Settings Doe, Sep 23, 2015.</h4>
        <a class="w3-button w3-light-grey">Reply<i class="w3-margin-left fa fa-mail-reply"></i></a>
        <a class="w3-button w3-light-grey">Forward<i class="w3-margin-left fa fa-arrow-right"></i></a>
        <hr>
        <p>Welcome.</p>
        <p>That's it!</p>

    </div>
    -->
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



    </body>
@endsection
