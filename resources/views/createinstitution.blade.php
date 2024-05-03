@extends('layouts.app')

@section('content')

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} | Registration Page</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{asset('css/liblaravel.css')}}"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    <link href="{{ mix('css/vendor.css') }}" rel="stylesheet">

</head>
<body class="hold-transition register-page">
    <div class="w3-main">
        <div class="register-logo">
        <a href="{{ url('/home') }}"><b>New Space</b></a>
    </div>

    <div class="card w3-container" >
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>
            <form action="{{ route('/create-enviroment') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" class="title">
                    <label>cep</label>
                    <input type="number" name="cep" value="{{ old('cep') }}" class="form-control" id="cep" class="cep">
                    <label>uf</label>
                    <input type="text" name="uf"  value="{{ old('uf') }}"class="form-control" id="uf" class="uf">
                    <label>city</label>
                    <input type="text" name="city" value="{{ old('city') }}" class="form-control" id="city" class="city">
                    <label>address</label>
                    <input type="text" name="address" value="{{ old('address') }}" class="form-control" id="address" class="address">
                    <label>email</label>
                    <input type="email" name="email"  value="{{ old('email') }}" class="form-control" id="email" class="email">
                    </label>
                    <br/>
                    <input type="submit" class="btn btn-primary btn-block" value="gravar">
                </div>
            </form>


        </div>

        <!-- /.form-box -->
    </div><!-- /.card -->

    <!-- /.form-box -->
</div>
<!-- /.register-box -->


<script src="{{ mix('js/app.js') }}" defer></script>

</body>
</html>
@endsection
