<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>V-cino</title>
		<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
	</head>
	<body>
		<div id="printableArea">
			<div class="row">
				<div class="table-responsive">
					<table class="table" style="width: 90%; margin: auto; margin-bottom: 10px;">
						<tbody>
							<tr>
								<td style="border: 0;">
									<div class="p-h-xl"><img src="{{ URL::asset(Auth::user()->company->logotipo)}}" width="{{Auth::user()->company->width_logo}}"></div>
								</td>
								<td style="border: 0; vertical-align:bottom">
									<div class="p-h-xl text-right">
										<h2 >RECIBO DE INGRESO</h2>
										<h3 >N&#186;&nbsp;<span>{{ str_pad($collection->transaction->nro_documento, 6, "0", STR_PAD_LEFT)}}</span></h3>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-3">
				</div>
				<div class="col-sm-6" style="width: 50%; margin: auto;">
					<div class="hr-line-solid"></div>
				</div>
				<div class="col-sm-3">
				</div>
			</div>

			<div class="row">
				<table style="margin: 10px auto; text-align: left; width: 90%; font-size: 13px;">
					<tr>
						<td>
							<table cellpadding="0" cellspacing="0" style="width: 100%;">
								<tr>
									<td style="width: 90px;">Fecha:</td>
									<td>{{ date_format(date_create($collection->transaction->fecha_pago),'d/m/Y') }}</td>
								</tr>
								<tr>
									<td>Propiedad:</td>
									<td><span style="text-transform: uppercase;"><strong>{{ $collection->property->nro }} - {{ $collection->contact->nombre }} {{ $collection->contact->apellido }}</strong></span></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<table cellpadding="0" cellspacing="0" style="width: 100%;">

								<tr>
									<td style="border-top: 0px solid #333; border-bottom: 2px solid #333; font-weight: 500;" class="alignright" width="80%; padding: 5px 0;">Cuota(s)</td>
									<td style="border-top: 0px solid #333; border-bottom: 2px solid #333; font-weight: 500; text-align: right; padding: 3px 0;">Importe</td>
								</tr>
								
								@foreach($cuotas as $cuota)
								<tr>
									<td style="border-top: #eee 1px solid; padding: 3px 0;">
										{{ $cuota->quota->category->nombre }} : {{ $cuota->quota->cuota }} {{nombremes($cuota->periodo) }}/{{$cuota->gestion}}
									</td>
									<td style="border-top: #eee 1px solid; text-align: right; padding: 3px 0;">{{ number_format($cuota->importe_por_cobrar, 2, '.', '.') }}</td>
								</tr>
								@endforeach
								<tr>
									<td style="border-top: #eee 1px solid; padding: 3px 0;">
										&nbsp;
									</td>
									<td style="border-top: #eee 1px solid; text-align: right; padding: 3px 0;"></td>
								</tr>

								<tr style="font-size: 14px;">
									<td style="border-top: 2px solid #333; border-bottom: 2px solid #333; font-weight: 700;" class="alignright" width="80%; padding: 5px 0;">Total Bs.</td>
									<td style="border-top: 2px solid #333; border-bottom: 2px solid #333; font-weight: 700; text-align: right; padding: 3px 0;">{{ number_format($collection->transaction->importe_credito, 2, '.', '.') }}</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td style="padding-top: 8px;">
							<h4>SON: {{ numeroaliteral($collection->transaction->importe_credito) }}</h4>
						</td>
					</tr>
				</table>
			</div>
			<br>
			<br>
			<br>

			<div class="row">
				<table width="100%">

					<tr>
						<td width="20%"></td>
						<td width="20%">
							<div class="hr-line-solid" style="margin-bottom: 1px; border-top: 1px solid #A4A4A4;"></div>
							<span style="font-size: 10px;">Entregue conforme</span><br/>&nbsp;
						</td>
						<td width="20%"></td>
						<td width="20%">
							<div class="hr-line-solid" style="margin-bottom: 1px; border-top: 1px solid #A4A4A4;"></div>
							<span style="font-size: 10px;">Recibí conforme<br>
								Administración</span>
						</td>
						<td width="20%"></td>
					</tr>
				</table>

			</div>
		</div>
	</body>

</html>

