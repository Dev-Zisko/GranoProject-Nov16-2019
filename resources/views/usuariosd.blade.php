@extends('layouts.dashboard')

@section('menu')
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('categorias') }}"><i class="fa fa-fw fa-bars"></i>Categorías</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('gastos') }}"><i class="fa fa-fw fa-balance-scale"></i>Gastos</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('facturas') }}"><i class="fa fa-fw fa-file-alt"></i>Facturas</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('main') }}"><i class="fa fa-fw fa-dollar-sign"></i>Pagos</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('usuarios') }}"><i class="fa fa-fw fa-user-circle"></i>Usuarios</a>
    </li>
@endsection

@section('content')
<!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 style="text-align: center;" class="pageheader-title">Eliminar Usuario</h2>
                                <h4 style="text-align: center; color: #7F0000;">Al eliminar al usuario se perderán a su vez las facturas asociadas a él.</h4>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                        <div class="row">
                         <form style="margin: 0 auto;" class="form-login" method="POST">
                        @csrf
                        <div class="card-header card-header-primary text-center">
                          <div class="social-line">

                            <div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="fa fa-fw fa-id-card"></i>
                                        </span>
                                    </div>
                                    <input id="cedula" name="cedula" type="number" class="form-control" value="{{ $user->cedula }}" min="0" disabled>
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
                                        <i style="color: #4267FF;" class="fa fa-fw fa-user"></i>
                                        </span>
                                    </div>
                                    <input id="nombre" name="nombre" type="text" class="form-control" value="{{ $user->nombre }}" disabled>
                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif
                                    <span class="input-group-addon">_</span>
                                    <input id="apellido" name="apellido" type="text" class="form-control" value="{{ $user->apellido }}" disabled>
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
                                        <i style="color: #4267FF;" class="fa fa-fw fa-phone"></i>
                                        </span>
                                    </div>
                                    <input id="telefono" name="telefono" type="number" class="form-control" min="0" value="{{ $user->telefono }}" disabled>
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
                                        <i style="color: #4267FF;" class="fa fa-fw fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input id="email" name="email" type="email" class="form-control" value="{{ $user->email }}" disabled>
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
                                        <i style="color: #4267FF;" class="fa fa-fw fa-home"></i>
                                        </span>
                                    </div>
                                    <input id="piso" name="piso" type="number" class="form-control" value="{{ $user->piso }}" min="0" disabled>
                                    @if ($errors->has('piso'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('piso') }}</strong>
                                        </span>
                                    @endif
                                    <span class="input-group-addon">_</span>
                                    <input id="apartamento" name="apartamento" type="number" class="form-control" min="0" value="{{ $user->apartamento }}" disabled>
                                    @if ($errors->has('apartamento'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('apartamento') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('alicuota') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="fa fa-fw fa-percent"></i>
                                        </span>
                                    </div>
                                    <input id="alicuota" name="alicuota" type="number" class="form-control" min="0" step="any" value="{{ $user->alicuota }}"disabled>
                                    @if ($errors->has('alicuota'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('alicuota') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="fa fa-fw fa-cog"></i>
                                        </span>
                                    </div>
                                    <input id="rol" name="rol" type="text" class="form-control" value="{{ $user->rol }}" disabled>
                                    @if ($errors->has('rol'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('rol') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="fa fa-fw fa-lock"></i>
                                        </span>
                                    </div>
                                    <input id="password" name="password" type="password" class="form-control" value="********" disabled>
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
                            <button type="submit" class="btn btn-outline-primary">Eliminar</button>
                        </div>
                      </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
@endsection