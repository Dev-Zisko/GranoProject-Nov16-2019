<style type="text/css">
    table {
      font-family: "Helvetica Neue", Helvetica, sans-serif
    }

    caption {
      text-align: left;
      color: silver;
      font-weight: bold;
      text-transform: uppercase;
      padding: 5px;
    }

    thead {
      background: SteelBlue;
      color: white;
    }

    th,
    td {
      padding: 5px 10px;
    }

    tbody tr:nth-child(even) {
      background: WhiteSmoke;
    }

    tbody tr td:nth-child(2) {
      text-align:center;
    }

    tbody tr td:nth-child(3),
    tbody tr td:nth-child(4) {
      text-align: right;
      font-family: monospace;
    }

    tfoot {
      background: SeaGreen;
      color: white;
      text-align: right;
    }

    tfoot tr th:last-child {
      font-family: monospace;
    }
</style>


<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12" style="text-align: center;">
    <div class="card">
        <img style="height: 110px;" src="images/logopdf.png" />
        <h1 class="card-header">Factura del {{$bill->mes}}/{{$bill->año}}</h1>
        <h3 style="color: red;" class="card-header">Vence: {{$bill->fechavencimiento}}</h3>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table style="margin: 0 auto;">
                    <thead class="bg-light">
                        <tr>
                            <th style="text-align: center;">Cédula</th>
                            <th style="text-align: center;">Nombre y Apellido</th>
                            <th style="text-align: center;">Piso</th>
                            <th style="text-align: center;">Apartamento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center; font-weight: bold;">{{ Auth::user()->cedula }}</td>
                            <td style="text-align: center;  font-weight: bold;">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</td>
                            <td style="text-align: center;  font-weight: bold;">{{ Auth::user()->piso }}</td>
                            <td style="text-align: center; font-weight: bold;">{{ Auth::user()->apartamento }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <h3 class="card-header">Gastos de la Factura</h3>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table style="margin: 0 auto;">
                    <thead class="bg-light">
                        <tr>
                            <th style="text-align: center;">Categoría</th>
                            <th style="text-align: center;">Nombre</th>
                            <th style="text-align: center;">Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($details as $detail)
                        <tr>
                            <td style="text-align: center; font-weight: bold;">{{ $detail->categoria }}</td>
                            <td style="text-align: center;  font-weight: bold;">{{ $detail->gasto }}</td>
                            <td style="text-align: center;  font-weight: bold;">Bs. {{ $detail->monto }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table align="right">
                    <thead class="bg-light">
                        <tr>
                            <th style="text-align: center;">Monto Total a Pagar:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center; font-weight: bold;">Bs. {{ $bill->monto }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>