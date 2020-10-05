@extends('layouts.home')

@section('content')
<section class="hero-wrap js-fullheight">
    <div class="container">
        <div class="row description js-fullheight align-items-center justify-content-center">
            <div class="col-md-8 text-center">
                <div class="text">
                    <h1>Registro</h1>
                    <div class="card card-login py-4">
                      <form class="form-login" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="card-header card-header-primary text-center">
                          <div class="social-line">

                            <div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="ion-ios-card"></i>
                                        </span>
                                    </div>
                                    <input id="cedula" name="cedula" type="number" class="form-control" placeholder="Cédula..." value="{{ old('cedula') }}" min="0" required>
                                    @if ($errors->has('cedula'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('cedula') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="ion-ios-contact"></i>
                                        </span>
                                    </div>
                                    <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre..." value="{{ old('nombre') }}" required>
                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif
                                    <span class="input-group-addon">_</span>
                                    <input id="apellido" name="apellido" type="text" class="form-control" placeholder="Apellido..." value="{{ old('apellido') }}" required>
                                    @if ($errors->has('apellido'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('apellido') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="ion-ios-call"></i>
                                        </span>
                                    </div>
                                    <input id="telefono" name="telefono" type="number" class="form-control" placeholder="Teléfono..." min="0" value="{{ old('telefono') }}" required>
                                    @if ($errors->has('telefono'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('telefono') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

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

                            <div class="form-group{{ $errors->has('piso') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="ion-ios-home"></i>
                                        </span>
                                    </div>
                                    <input id="piso" name="piso" type="number" class="form-control" placeholder="Piso..." value="{{ old('piso') }}" min="0" required>
                                    @if ($errors->has('piso'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('piso') }}</strong>
                                        </span>
                                    @endif
                                    <span class="input-group-addon">_</span>
                                    <input id="apartamento" name="apartamento" type="number" class="form-control" placeholder="Apartamento..." min="0" value="{{ old('apartamento') }}" required>
                                    @if ($errors->has('apartamento'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('apartamento') }}</strong>
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

                            <div class="form-group{{ $errors->has('password-confirm') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="ion-ios-lock"></i>
                                        </span>
                                    </div>
                                    <input id="password-confirm" name="password_confirmation" type="password" class="form-control" placeholder="Repertir Contraseña..." value="{{ old('password-confirm') }}" required>
                                    @if ($errors->has('password-confirm'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('password-confirm') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('codigo') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="ion-ios-alert"></i>
                                        </span>
                                    </div>
                                    <input id="codigo" name="codigo" type="text" class="form-control" placeholder="Código Secreto..." value="{{ old('codigo') }}" required>
                                    @if ($errors->has('codigo'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('codigo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <input id="alicuota" name="alicuota" type="hidden" class="form-control" value="0" readonly="readonly">

                            <input id="rol" name="rol" type="hidden" class="form-control" value="User" readonly="readonly">

                          </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-outline-primary">Registrar</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
