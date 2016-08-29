@extends('layouts.app')
@section('bodypage')
    <body class="inicio">
@endsection
<!-- Main Content -->
@section('contenido')
    <main class="ed-container">
        <div class="ed-item">
            <h1>Restablecer Contraseña</h1>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="login-form ed-container web-40" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}
                <div class="ed-item form-item">
                    <label for="email">E-Mail Address</label>
                    <input id="email" type="email" class="input" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                </div>

                <div class="ed-item form-item">
                    <button type="submit">Send Password Reset Link</button>
                </div>
            </form>
        </div>
    </main>
@endsection
