@extends('layouts.home')

@section('content')
<section class="hero-wrap js-fullheight">
    <div class="container">
        <div class="row description js-fullheight align-items-center justify-content-center">
            <div class="col-md-8 text-center">
                <div class="text">
                    <h1>Login</h1>
                    <div class="card card-login py-4">
                      <form class="form-login" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="card-header card-header-primary text-center">
                          <div class="social-line">

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="ion-ios-mail"></i>
                                        </span>
                                    </div>
                                    <input id="email" name="email" type="email" class="form-control" placeholder="Correo Electrónico..." value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="ion-ios-lock"></i>
                                        </span>
                                    </div>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña..." value="{{ old('password') }}" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                          </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-outline-primary">Entrar</button>
                        </div>
                        <br>
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                Olvidaste tu contraseña?
                            </a>
                        @endif
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
