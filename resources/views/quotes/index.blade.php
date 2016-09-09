@extends('layouts.admin')

@section('admin-content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Cuotas</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="#/">Inicio</a>
                </li>
                <li>
                    Configuración
                </li>
                <li class="active">
                    <strong>Lista de cuotas</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-lg-9">
                @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {!! session('message') !!}
                    </div>
                @endif
                <div class="ibox">
                    <div class="ibox-content">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Cuota</th>
                                <th>Categoría</th>
                                <th>Tipo de propiedad</th>
                                <th class="text-right">Importe</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($quotes as $quota)
                                @if($quota->activa == 1)
                            <tr>
                                <td>{{ $quota->cuota }}</td>
                                <td>{{ $quota->category->nombre }}</td>
                                <td>{{ $quota->typeProperty->tipo_propiedad }}</td>
                                <td class="text-right">{{ $quota->importe }}</td>
                                <td><span class="text-success">Activa</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            Opciones
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="{{ route('config.quota.show', $quota->id) }}">Ver Cuota</a></li>
                                            <li><a href="{{ route('config.quota.edit', $quota->id) }}">Editar Cuota</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                                @else
                                    <tr>
                                        <td ><span class="text-muted">{{ $quota->cuota }}</span></td>
                                        <td ><span class="text-muted">{{ $quota->category->nombre }}</span></td>
                                        <td ><span class="text-muted">{{ $quota->typeProperty->tipo_propiedad }}</span></td>
                                        <td class="text-right text-muted">{{ $quota->importe }}</td>
                                        <td><p><span class="text-danger">Inactiva</span></p></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    Opciones
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                    <li><a href="{{ route('config.quota.show', $quota->id) }}">Ver Cuota</a></li>
                                                    <li><a href="{{ route('config.quota.edit', $quota->id) }}">Editar Cuota</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title text-left" style="padding-left: 20px;">
                        <a href="{{ route('config.quota.create') }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Nueva Cuenta" data-original-title="Nueva Cuenta" style="margin-right: 10px;"> Nueva </a>
                        <button type="button" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="bottom" title="Imprimir lista..." data-original-title="Imprimir lista..." style="margin-right: 10px;"> <i class="fa fa-print fa-lg"></i> </button>
                        <button type="button" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="bottom" title="Exportar" data-original-title="Exportar"> <i class="fa fa-file-excel-o fa-lg"></i> </button>
                    </div>
                    <div class="ibox-content">
                        <h5>
                            Cuotas
                        </h5>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>



@endsection
@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/datatables.min.css') }}" />
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ URL::asset('js/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                "paging":   false,
                "info":     false
            });
        } );
    </script>
@endsection