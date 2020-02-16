<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@if(substr( url()->current(), 0, 5 ) === "https")
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	@endif
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>
	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<body>
    <div>
        <nav class="navbar sticky-top navbar-expand-sm navbar-light bg-white mb-4">
            <div class="container">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <!-- Collapsed Hamburger -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Login</div>
                        <div class="card-body">
                            @if(Session::has('message'))
                            <p class="alert alert-danger">{{ Session::get('message') }}</p>
                            @endif
                            <form method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 col-form-label">E-Mail Address</label>
                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required="" autofocus="">
                                    </div>
                                </div>

                                <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 col-form-label">Password</label>

                                    <div class="col-md-8">
                                        <input id="password" type="password" class="form-control" name="password" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-8 ml-auto">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" name="stay-login" type="checkbox"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Login</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

			