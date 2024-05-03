@extends('layouts.app')

@section('content')
 <head>
    <meta charset="utf-8">
    <title>Novo separador</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/choices.css')}}">

</head>
  <body >
    <!-- TOP BAR -->

<div class="w3-container w3-row w3-center w3-padding-24" style="color: black;background-color:white;border-radius:10px;">
    <div class="w3-quarter">
      <span class="w3-xxlarge">Status Geral:</span>
    </div>
    <div class="w3-quarter">
      <span class="w3-xxlarge">34</span>
      <br>Erros Criticos
    </div>
    <div class="w3-quarter">
      <span class="w3-xxlarge">03</span>
      <br>Alertas
    </div>
    <div class="w3-quarter">
      <span class="w3-xxlarge">51</span>
      <br>Notificaão
    </div>

</div>
<hr>


<!--CATEGORIES-->
<div class="w3-row-padding w3-margin-bottom">
    <div class="row">

        <!--EVENTS PROGRAMED TODAY -->
        <div class="col-xl-3 col-md-6 mb-4" style="color:#f8f9fc;border-radius:10px;">
            <div class="border-left-primary shadow card h-100 py-2" style="background-color:#e74a3b;">
                <table>
                    <td>&nbsp;&nbsp;&nbsp;<i class="fas fa-clipboard-check	fa-2x text-gray-300" style="color: #f8f9fc;"></i></td>
                    <td><h3>&nbsp;<strong>PCP</strong></h3></td>
                </table>
                    <table style="text-align: center;">
                        <tr>
                            <td><span><h2>&nbsp;<strong>19</strong>&nbsp;</h2></span></td>
                            <td style="border-left: 1px solid ;align-content: center;border-right: 1px solid ;align-content: center;"><span ><h2>&nbsp;<strong>16</strong>&nbsp;</h2></span></td>
                            <td><span><strong><h2>&nbsp;<strong>03</strong>&nbsp;</h2></strong></span></td>
                        </tr>
                        <tr>
                            <td><h3>Erros</h3></td>
                            <td><h3>Alertas</h3></td>
                            <td><h3>Info</h3></td>
                        </tr>
                    </table>
            </div>
        </div>
        <!--ALERTS-->
        <div class="col-xl-3 col-md-6 mb-4" style="color:#f8f9fc;border-radius:10px;">
            <div class="border-left-primary shadow card h-100 py-2" style="background-color:#e74a3b;">
                <table>
                    <td>&nbsp;&nbsp;&nbsp;<i class="fas fa-box fa-2x text-gray-300" style="color: #f8f9fc;"></i></td>
                    <td><h3>&nbsp;<strong>ESTOQUE</strong></h3></td>
                </table>
                    <table style="text-align: center;">
                        <tr>
                            <td><span><h2>&nbsp;<strong>12</strong>&nbsp;</h2></span></td>
                            <td style="border-left: 1px solid ;align-content: center;border-right: 1px solid ;align-content: center;"><span ><h2>&nbsp;<strong>08</strong>&nbsp;</h2></span></td>
                            <td><span><strong><h2>&nbsp;<strong>03</strong>&nbsp;</h2></strong></span></td>
                        </tr>
                        <tr>
                            <td><h3>Erros</h3></td>
                            <td><h3>Alertas</h3></td>
                            <td><h3>Info</h3></td>
                        </tr>
                    </table>
            </div>
        </div>
        <!--USERS IN ACTIVITY (TODAY ) -->
        <div class="col-xl-3 col-md-6 mb-4" style="color:#f8f9fc;border-radius:10px;">
            <div class="border-left-primary shadow card h-100 py-2" style="background-color:#e74a3b;">
                <table>
                    <td>&nbsp;&nbsp;&nbsp;<i class="fas fa-hand-holding-usd	 fa-2x text-gray-300" style="color: #f8f9fc;"></i></td>
                    <td><h3>&nbsp;<strong>FATURAMENTO</strong></h3></td>
                </table>
                    <table style="text-align: center;">
                        <tr>
                            <td><span><h2>&nbsp;<strong>03</strong>&nbsp;</h2></span></td>
                            <td style="border-left: 1px solid ;align-content: center;border-right: 1px solid ;align-content: center;"><span ><h2>&nbsp;<strong>02</strong>&nbsp;</h2></span></td>
                            <td><span><strong><h2>&nbsp;<strong>05</strong>&nbsp;</h2></strong></span></td>
                        </tr>
                        <tr>
                            <td><h3>Erros</h3></td>
                            <td><h3>Alertas</h3></td>
                            <td><h3>Info</h3></td>
                        </tr>
                    </table>
            </div>
        </div>
        <!-- MESSAGES -->
        <div class="col-xl-3 col-md-6 mb-4" style="color:#f8f9fc;border-radius:10px;">
            <div class="border-left-primary shadow card h-100 py-2" style="background-color:#f5b30e;">
                <table>
                    <td>&nbsp;&nbsp;&nbsp;<i class="fas fa-cash-register fa-2x text-gray-300" style="color: #f8f9fc;"></i></td>
                    <td><h3>&nbsp;<strong>VENDAS</strong></h3></td>
                </table>
                    <table style="text-align: center;">
                        <tr>
                            <td><span><h2>&nbsp;<strong>00</strong>&nbsp;</h2></span></td>
                            <td style="border-left: 1px solid ;align-content: center;border-right: 1px solid ;align-content: center;"><span ><h2>&nbsp;<strong>02</strong>&nbsp;</h2></span></td>
                            <td><span><strong><h2>&nbsp;<strong>07</strong>&nbsp;</h2></strong></span></td>
                        </tr>
                        <tr>
                            <td><h3>Erros</h3></td>
                            <td><h3>Alertas</h3></td>
                            <td><h3>Info</h3></td>
                        </tr>
                    </table>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4" style="color:#f8f9fc;border-radius:10px;">
            <div class="border-left-primary shadow card h-100 py-2" style="background-color:#f5b30e;">
                <table>
                    <td>&nbsp;&nbsp;&nbsp;<i class="fab fa-linux fa-2x text-gray-300" style="color: #f8f9fc;"></i></td>
                    <td><h3>&nbsp;<strong>LINUX</strong></h3></td>
                </table>
                    <table style="text-align: center;">
                        <tr>
                            <td><span><h2>&nbsp;<strong>00</strong>&nbsp;</h2></span></td>
                            <td style="border-left: 1px solid ;align-content: center;border-right: 1px solid ;align-content: center;"><span ><h2>&nbsp;<strong>02</strong>&nbsp;</h2></span></td>
                            <td><span><strong><h2>&nbsp;<strong>03</strong>&nbsp;</h2></strong></span></td>
                        </tr>
                        <tr>
                            <td><h3>Erros</h3></td>
                            <td><h3>Alertas</h3></td>
                            <td><h3>Info</h3></td>
                        </tr>
                    </table>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4" style="color:#f8f9fc;border-radius:10px;">
            <div class="border-left-primary shadow card h-100 py-2" style="background-color:#36b9cc
            ;">
                <table>
                    <td>&nbsp;&nbsp;&nbsp;<i class="fab fa-windows	fa-2x text-gray-300" style="color: #f8f9fc;"></i></td>
                    <td><h3>&nbsp;<strong>WINDOWS</strong></h3></td>
                </table>
                    <table style="text-align: center;">
                        <tr>
                            <td><span><h2>&nbsp;<strong>00</strong>&nbsp;</h2></span></td>
                            <td style="border-left: 1px solid ;align-content: center;border-right: 1px solid ;align-content: center;"><span ><h2>&nbsp;<strong>00</strong>&nbsp;</h2></span></td>
                            <td><span><strong><h2>&nbsp;<strong>30</strong>&nbsp;</h2></strong></span></td>
                        </tr>
                        <tr>
                            <td><h3>Erros</h3></td>
                            <td><h3>Alertas</h3></td>
                            <td><h3>Info</h3></td>
                        </tr>
                    </table>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4" style="color:#f8f9fc;border-radius:10px;">
            <div class="border-left-primary shadow card h-100 py-2" style="background-color:#1cc88a
            ;">
                <table>
                    <td>&nbsp;&nbsp;&nbsp;<i class="fab fa-chrome fa-2x text-gray-300" style="color: #f8f9fc;"></i></td>
                    <td><h3>&nbsp;<strong>PORTAL DE VENDAS</strong></h3></td>
                </table >
                <a href="#" class=" btn-success btn-icon-split btn-lg">
                    <table style="text-align: center;">
                        <TD><span class="icon text-white-50">
                        <i class="fas fa-check fa-2x text-gray-300"></i>
                    </span></TD>
                    <TD><span class="text" style="text-align: center;align: center;"><H1>OK </H1></span></TD>
                    </table>
                </a>
                </div>

        </div>

</div>





        <!-- test -->
        <!-- test -->
        <!-- test -->





</div>
  </body>


@endsection
