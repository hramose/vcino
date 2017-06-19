@extends('layouts.admin')

@section('admin-content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Histórico de transacciones</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.home') }}">Inicio</a>
            </li>
            <li>
                Reportes
            </li>
            <li class="active">
                <strong>Histórico de transacciones</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">

    <!--            *******************************         -->
    <!--                        TRASPASOS                   -->
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5 style="padding-top: 7px;">Histórico de transacciones</h5>

                    <div class="ibox-tools" style="padding-bottom: 7px;">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="bottom" title="Imprimir reporte" data-original-title="Imprimir reporte">
                                <i class="fa fa-print"></i>&nbsp;&nbsp;Imprimir...
                            </button>
                            <button type="button" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="bottom" title="Exportar reporte a Excel" data-original-title="Exportar reporte a Excel">
                                <i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;Exportar...
                            </button>
                        </div>
                    </div>
                </div>

                <div class="ibox-content ibox-heading" style="background-color: #ECF7FE">
                    <h3><i class="fa fa-table">&nbsp;&nbsp;</i>Histórico de transacciones - Traspasos</h3>
                    <small style="padding-left:36px;">Periodo: Marzo/2017 - Moneda: Bolivianos</small>
                </div>

                <div class="ibox-content">
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-10">

                        <div class="table-responsive" style="margin-top: 20px;">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr bgcolor="#D6D6D6">
                                        <th style="vertical-align:bottom">Fecha</th>
                                        <th style="vertical-align:bottom">Documento</th>
                                        <th style="vertical-align:bottom">Concepto</th>
                                        <th style="vertical-align:bottom">Cuenta origen</th>
                                        <th style="vertical-align:bottom">Cuenta destino</th>
                                        <th style="vertical-align:bottom">Forma de pago</th>
                                        <th style="text-align:right; vertical-align:bottom">Importe</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>11/03/2017</td>
                                        <td>T-000008</td>
                                        <td>Taspaso de fondos para caja chica</td>
                                        <td>BCP CC en Bolivianos</td>
                                        <td>Caja Chica</td>
                                        <td>Cheque</td>
                                        <td style="text-align:right;">450.00</td>
                                    </tr>
                                <tfoot>
                                    <th colspan="6">Total</th>
                                    <th style="text-align:right;">450,00</th>
                                </tfoot>
                            </table>
                        </div>


                    </div>
                    <div class="col-sm-1">
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="hr-line-dashed"></div>

                            <div class="form-group text-left">
                                <button class="btn btn-success" type="submit">Volver</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--            FIN TRASPASOS                               -->


    <!--            *******************************             -->
    <!--                 TODAS LAS TRANSACCIONES                -->
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5 style="padding-top: 7px;">Histórico de transacciones</h5>

                    <div class="ibox-tools" style="padding-bottom: 7px;">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="bottom" title="Imprimir reporte" data-original-title="Imprimir reporte">
                                <i class="fa fa-print"></i>&nbsp;&nbsp;Imprimir...
                            </button>
                            <button type="button" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="bottom" title="Exportar reporte a Excel" data-original-title="Exportar reporte a Excel">
                                <i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;Exportar...
                            </button>
                        </div>
                    </div>
                </div>

                <div class="ibox-content ibox-heading" style="background-color: #ECF7FE">
                    <h3><i class="fa fa-table">&nbsp;&nbsp;</i>Histórico de transacciones - Todas las transacciones</h3>
                    <small style="padding-left:36px;">Periodo: Marzo/2017 - Moneda: Bolivianos</small>
                </div>

                <div class="ibox-content">
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-10">

                        <div class="table-responsive" style="margin-top: 20px;">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr bgcolor="#D6D6D6">
                                        <th style="vertical-align:bottom">Fecha</th>
                                        <th style="vertical-align:bottom">Documento</th>
                                        <th style="vertical-align:bottom">Beneficiario</th>
                                        <th style="vertical-align:bottom">Categoría</th>
                                        <th style="vertical-align:bottom">Concepto</th>
                                        <th style="vertical-align:bottom">Cuenta</th>
                                        <th style="text-align:right; vertical-align:bottom">Crédito</th>
                                        <th style="text-align:right; vertical-align:bottom">Débito</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>11/03/2017</td>
                                        <td>I-000008</td>
                                        <td>Caoba 01 - Carlos Marcos</td>
                                        <td>Expensas mensuales</td>
                                        <td>Pago de expensas enero 2017</td>
                                        <td>BCP CC en Bolivianos</td>
                                        <td style="text-align:right;">500.00</td>
                                        <td style="text-align:right;"></td>
                                    </tr>
                                    <tr>
                                        <td>12/03/2017</td>
                                        <td>E-000008</td>
                                        <td>OTIS</td>
                                        <td>Mantenimiento ascensores</td>
                                        <td>Pago servicio febrero 2017</td>
                                        <td>BCP CC en Bolivianos</td>
                                        <td style="text-align:right;"></td>
                                        <td style="text-align:right;">1.750.00</td>
                                    </tr>
                                    <tr>
                                        <td>13/03/2017</td>
                                        <td>T-000008</td>
                                        <td></td>
                                        <td></td>
                                        <td>Taspaso de fondos para caja chica</td>
                                        <td>BCP CC en Bolivianos - Caja chica</td>
                                        <td style="text-align:right;">450.00</td>
                                        <td style="text-align:right;">450.00</td>
                                    </tr>
                                <tfoot>
                                    <th colspan="6">Totales</th>
                                    <th style="text-align:right;">950,00</th>
                                    <th style="text-align:right;">1.200,00</th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-1">
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="hr-line-dashed"></div>

                            <div class="form-group text-left">
                                <button class="btn btn-success" type="submit">Volver</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--            FIN TODAS LAS TRANSACCIONES         -->


</div>





@endsection
@section('javascript')
<script>
	$('.date-picker').datetimepicker({
		format: 'DD/MM/YYYY'
	});
</script>
@endsection


