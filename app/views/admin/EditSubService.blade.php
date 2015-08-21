@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="container">

		<div class="col-xs-12">
			<div class="alert responseDanger" style="text-align:center;">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			</div>
			<select class="subServ form-control" autocomplete="off">
				<option value="" selected>Filtro por servicio</option>
				@foreach($serv as $s)
					<option value="{{ $s->id }}">{{ $s->nombre }}</option>
				@endforeach
			</select>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					@foreach($services as $s)
					<tr class="tr-slide-desc serv serv_{{ $s->id_serv }}">
						<td>{{ $s->id }}</td>
						<td>{{ $s->nombre }}</td>
						<td>
							@if(strlen($s->desc) >= 50)
								{{ substr($s->desc,0,50) }}...
							@else
								{{ $s->desc }}
							@endif
						</td>
						<td><a href="{{ URL::to('administrador/editar-sub-servicios/'.$s->id) }}" class="btn btn-warning btn-xs">Editar</a></td>
						<td><button class="btn btn-danger btn-xs deleteSlide" value="{{ $s->id }}" data-toggle="modal" data-target="#elimModal">Eliminar</button></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		

	</div>
</div>
<div class="modal fade" id="elimModal" tabindex="-1" role="dialog" aria-labelledby="modalForggo" aria-hidden="true">
	<div class="forgotPass modal-dialog imgLiderUp">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<legend>¿Seguro desea eliminar al usuario?</legend>
			</div>
				<div class="modal-body">
					<p class="textoPromedio">Esta acción es irreversible, si desea continuar precione eliminar</p>
											
				</div>
				<div class="modal-footer " style="text-align:center;">
					<div class="alert responseDanger textoPromedio">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					</div>
					
					<button class="btn btn-danger envElim" name="eliminar" value="" style="margin-top:2em;">Eliminar</button>	
					
				</div>
		</div>
	</div>
</div>
@stop