<!DOCTYPE html>
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
<div class="register-box">
    <div class="register-logo">
        <a href="{{ url('/home') }}"><b>{{ config('app.name') }}</b></a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>
            <form action="{{ route('/create-enviroment') }}" method="post">
                @csrf
                <div class="form-group">

                    <label>email</label>
                    <input type="email" name="email"  value="{{ old('email') }}" class="form-control" id="email" class="email">
                    <br/>
                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Search">
                </div>
            </form>

            <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
        <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">


        </table><br>

</div>

    <script src="{{ mix('js/app.js') }}" defer></script>

</body>
</html>
