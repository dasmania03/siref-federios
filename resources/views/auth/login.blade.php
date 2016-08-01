@extends('layouts.app')
@section('bodypage')
    <body class="inicio">
@endsection
@section('contenido')
    <main class="ed-container">
        <div class="ed-item">
            <h1>Ingresar</h1>
            <form class="login-form ed-container web-40" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="ed-item form-item">
                    <label for="username">Usuario</label>
                    <input id="username" type="text" class="input" name="username" value="{{ old('username') }}">
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="ed-item form-item">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" class="input" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <input type="checkbox" name="remember"><p class="forgot-password">Recordarme</p>
                    <div class="ed-item form-item">
                        <button type="submit">Ingresar</button>
                        <a class="forgot-password" href="{{ url('/password/reset') }}">Olvidastes tu Contraseña?</a>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
