@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="container">

		<div class="col-xs-12">
			<div class="alert responseDanger" style="text-align:center;">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			</div>
			
		</div>
		<div class="col-xs-12 col-md-6 contCentrado contdeColor">
			<form method="POST" action="{{ URL::to('administrador/editar-servicios/procesar') }}" class="form-serv" enctype="multipart/form-data">
				<fieldset class="formulario">
					<label for="nombre">Nombre:</label>
					<input type="text" name="nombre" value="{{ $service->nombre }}" class="form-control form-validate" required>
					@if ($errors->has('nombre'))
						 @foreach($errors->get('nombre') as $err)
						 	<div class="alert alert-danger">
						 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						 		<p class="textoPromedio">{{ $err }}</p>
						 	</div>
						 @endforeach
					@endif
				</fieldset>
				<fieldset class="formulario">
					<label for="nombre_eng">Nombre (Ingles):</label>
					<input type="text" name="nombre_eng" value="{{ $service->nombre_eng }}" class="form-control form-validate" required>
					@if ($errors->has('nombre_eng'))
						 @foreach($errors->get('nombre_eng') as $err)
						 	<div class="alert alert-danger">
						 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						 		<p class="textoPromedio">{{ $err }}</p>
						 	</div>
						 @endforeach
					@endif
				</fieldset>
				<fieldset class="formulario">
					<label>Descripción:</label>
					<textarea class="form-control form-validate" rows="10" name="desc">
						{{ $service->servicios_desc }}
					</textarea>
					@if ($errors->has('desc'))
						 @foreach($errors->get('desc') as $err)
						 	<div class="alert alert-danger">
						 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						 		<p class="textoPromedio">{{ $err }}</p>
						 	</div>
						 @endforeach
					@endif
				</fieldset>
				<fieldset class="formulario">
					<label>Descripción (Ingles): </label>
					<textarea class="form-control form-validate" rows="10" name="desc_eng">
						{{ $service->servicios_desc_eng }}
					</textarea>
					@if ($errors->has('desc_eng'))
						 @foreach($errors->get('desc_eng') as $err)
						 	<div class="alert alert-danger">
						 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						 		<p class="textoPromedio">{{ $err }}</p>
						 	</div>
						 @endforeach
					@endif
				</fieldset>
				<fieldset class="formulario">
					<label for="icono">Icono (Solo el nombre Ej: fa-plus => <i class="fa fa-plus"></i>):</label>
					<input type="text" name="icono" value="{{ $service->icono }}" class="form-control form-validate" required>
					@if ($errors->has('icono'))
						 @foreach($errors->get('icono') as $err)
						 	<div class="alert alert-danger">
						 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						 		<p class="textoPromedio">{{ $err }}</p>
						 	</div>
						 @endforeach
					@endif
				</fieldset>
				<input type="hidden" value="{{ $service->id }}" name="id">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingOne">
				      <h4 class="panel-title">
				        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				          Agregar/Editar Imagenes (Opcional)
				        </a>
				      </h4>
				    </div>
				    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				      <div class="panel-body">
				      	<fieldset class="formulario">
					      	<label for="img_1">Imagen 1</label>
					        <input type="file" name="img_1">
				      	</fieldset>
				        <fieldset class="formulario">
					        <label for="img_1">Imagen 2</label>
					        <input type="file" name="img_2">
				        </fieldset>
				      </div>
				    </div>
				  </div>
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingOne">
				      <h4 class="panel-title">
				        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
				          Agregar/Editar Catalogo (Opcional)
				        </a>
				      </h4>
				    </div>
				    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				      <div class="panel-body">
				      	<fieldset class="formulario">
					      	<label for="doc">Catalogo</label>
					        <input type="file" name="doc">
				      	</fieldset>
				      </div>
				    </div>
				  </div>
				</div>
			</form>		
			<button class="btn btn-success btnSendServ">Enviar</button>
		</div>

	</div>
</div>

@stop