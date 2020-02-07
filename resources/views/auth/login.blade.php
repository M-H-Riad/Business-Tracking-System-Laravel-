<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Arise Admin Panel" />
    <meta name="keywords" content="" />
    <meta name="author" content="Ramji" />
    <link rel="shortcut icon" href="{{asset('admin/img/fav.png')}}">
    <title>Dashboard</title>

    <!-- Error CSS -->
    <link href="{{asset('admin/css/login.css')}}" rel="stylesheet" media="screen">

    <!-- Animate CSS -->
    <link href="{{asset('admin/css/animate.css')}}" rel="stylesheet" media="screen">

    <!-- Ion Icons -->
    <link href="{{asset('admin/fonts/icomoon/icomoon.css')}}" rel="stylesheet" />
</head>
<body>

<!-- Right Side Of Navbar -->
<ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
    @guest

    @else
        <script>window.location = "/home";</script>
    @endguest
</ul>


<form method="POST" action="{{ route('login') }}" id="wrapper">
    @csrf
    <div id="box" class="animated bounceIn">
        <div id="top_header">
            <img src="{{asset('admin/img/logo.png')}}" alt="Arise Admin Dashboard Logo" />
            <h5>
                Sign in to access your<br />
                Control panel.
            </h5>
        </div>
        <div id="inputs">
            <div class="form-block">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                @error('email')
                <span class="invalid-feedback" role="alert" style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <i class="icon-user-check"></i>
            </div>
            <div class="form-block">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                @error('password')
                <span class="invalid-feedback" role="alert" style="color: red">
                                        <strong >{{ $message }}</strong>
                                    </span>
                @enderror
                <i class="icon-spell-check"></i>
            </div>
            <input type="submit" value="Sign In">

        </div>
        <div id="bottom" class="clearfix">
            <div class="pull-right">
                <label class="switch pull-right">
                    <input type="checkbox" class="switch-input" {{ old('remember') ? 'checked' : '' }} checked>
                    <span class="switch-label" data-on="Yes" data-off="No"></span>
                    <span class="switch-handle"></span>
                </label>
            </div>

{{--            @if (Route::has('password.request'))--}}
{{--                <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                    {{ __('Forgot Your Password?') }}--}}
{{--                </a>--}}
{{--            @endif--}}
            <div class="pull-right">
                <span class="cb-label">Remember</span>
            </div>
        </div>
    </div>
</form>
</body>
</html>
