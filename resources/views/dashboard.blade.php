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
                                <h2 class="pageheader-title">Facturas del Edificio</h2>
                            </div>
                        </div>
                    </div>
                    <a style="margin: 0 auto; width: 150px; margin-bottom: 20px;" href="{{ route('facturasa') }}" class="btn btn-outline-primary"><i class="fa fa-eye"></i> Ver mis Facturas</a>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12" style="text-align: center;">
                                <div class="card">
                                    <h5 class="card-header">Facturas sin Pagar</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Mes</th>
                                                        <th class="border-0">Año</th>
                                                        <th class="border-0">Fecha Vencimiento</th>
                                                        <th class="border-0">Nombre y Apellido</th>
                                                        <th class="border-0">Piso</th>
                                                        <th class="border-0">Apartamento</th>
                                                        <th class="border-0">Monto a Pagar</th>
                                                        <th class="border-0">N° Confirmación</th>
                                                        <th class="border-0">Estado</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($users as $user)
                                                    @foreach($bills as $bill)
                                                        @if($bill->estado == "Sin Pagar")
                                                            @if($bill->id_user == $user->id)
                                                            <tr>
                                                                <td>{{ $bill->mes }}</td>
                                                                <td>{{ $bill->año }}</td>
                                                                <td>{{ $bill->fechavencimiento }}</td>
                                                                <td>{{ $user->nombre }} {{ $user->apellido }}</td>
                                                                 <td>{{ $user->piso }}</td>
                                                                <td>{{ $user->apartamento}}</td>
                                                                <td>{{ $bill->monto }}</td>
                                                                <td>{{ $bill->transferencia }}-</td>
                                                                <td><span class="badge-dot badge-danger mr-1"></span>{{ $bill->estado }}</td>
                                                            </tr>
                                                            @endif   
                                                        @endif
                                                    @endforeach
                                                    @endforeach
                                                    @if(count($bills) == 0)
                                                        <tr>
                                                            <td>No hay facturas</td>
                                                            <td>
                                                                registradas aún.
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                            <br>
                                            <div>{{ $bills->links() }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12" style="text-align: center;">
                                <div class="card">
                                    <h5 class="card-header">Facturas sin Procesar</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Mes</th>
                                                        <th class="border-0">Año</th>
                                                        <th class="border-0">Fecha Vencimiento</th>
                                                        <th class="border-0">Nombre y Apellido</th>
                                                        <th class="border-0">Piso</th>
                                                        <th class="border-0">Apartamento</th>
                                                        <th class="border-0">Monto a Pagar</th>
                                                        <th class="border-0">N° Confirmación</th>
                                                        <th class="border-0">Estado</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($users as $user)
                                                    @foreach($bills as $bill)
                                                        @if($bill->estado == "Procesando")
                                                            @if($bill->id_user == $user->id)
                                                            <tr>
                                                                <td>{{ $bill->mes }}</td>
                                                                <td>{{ $bill->año }}</td>
                                                                <td>{{ $bill->fechavencimiento }}</td>
                                                                <td>{{ $user->nombre }} {{ $user->apellido }}</td>
                                                                 <td>{{ $user->piso }}</td>
                                                                <td>{{ $user->apartamento}}</td>
                                                                <td>{{ $bill->monto }}</td>
                                                                <td>{{ $bill->transferencia }}</td>
                                                                <td><span class="badge-dot badge-brand mr-1"></span><a style="text-decoration: underline;" href="{{url('confirmar',Crypt::encrypt($bill->id))}}">{{ $bill->estado }}</a></td>
                                                            </tr>
                                                            @endif   
                                                        @endif
                                                    @endforeach
                                                    @endforeach
                                                    @if(count($bills) == 0)
                                                        <tr>
                                                            <td>No hay facturas</td>
                                                            <td>
                                                                registradas aún.
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                            <br>
                                            <div>{{ $bills->links() }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12" style="text-align: center;">
                                <div class="card">
                                    <h5 class="card-header">Facturas Pagadas</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Mes</th>
                                                        <th class="border-0">Año</th>
                                                        <th class="border-0">Fecha Vencimiento</th>
                                                        <th class="border-0">Nombre y Apellido</th>
                                                        <th class="border-0">Piso</th>
                                                        <th class="border-0">Apartamento</th>
                                                        <th class="border-0">Monto a Pagar</th>
                                                        <th class="border-0">N° Confirmación</th>
                                                        <th class="border-0">Estado</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($users as $user)
                                                    @foreach($bills as $bill)
                                                        @if($bill->estado == "Pagada")
                                                            @if($bill->id_user == $user->id)
                                                            <tr>
                                                                <td>{{ $bill->mes }}</td>
                                                                <td>{{ $bill->año }}</td>
                                                                <td>{{ $bill->fechavencimiento }}</td>
                                                                <td>{{ $user->nombre }} {{ $user->apellido }}</td>
                                                                 <td>{{ $user->piso }}</td>
                                                                <td>{{ $user->apartamento}}</td>
                                                                <td>{{ $bill->monto }}</td>
                                                                <td>{{ $bill->transferencia }}</td>
                                                                <td><span class="badge-dot badge-success mr-1"></span><a style="text-decoration: underline;" href="{{url('confirmar',Crypt::encrypt($bill->id))}}">{{ $bill->estado }}</a></td>
                                                            </tr>
                                                            @endif   
                                                        @endif
                                                    @endforeach
                                                    @endforeach
                                                    @if(count($bills) == 0)
                                                        <tr>
                                                            <td>No hay facturas</td>
                                                            <td>
                                                                registradas aún.
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                            <br>
                                            <div>{{ $bills->links() }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->
                            <!-- ============================================================== -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
@endsection