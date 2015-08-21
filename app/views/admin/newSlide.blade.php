@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="container">
		<div class="col-xs-12">
			<div class="col-xs-6 contdeColor contCentrado">
				<legend>Nuevo slide</legend>
				<p class="bg-info textoPromedio" style="padding:0.5em;">Recuerde que las imagenes para el slider debe ser de almenos 1290*800 pixels</p>
				<div class="bg-primary textoPromedio contOptionA" style="padding:0.5em;">
					<div class="col-xs-12">
						<a href="#" class="optionA" data-toggle="collapse" data-target=".single" style="color:white;">Unico slide </a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="single imagesSlidesOption textoPromedio collapse">
					<form method="POST" action="{{ URL::to('administrador/nuevo-slide/procesar') }}" enctype="multipart/form-data">
						<label>Slide:</label>
						<input type="file" name="img" >
						<div class="radio radio-info">
							<label>
								<input type="radio" class="checkbox" name="tipo" value="1" checked>
								<span class="circle"></span><span class="check"></span>
								Superior
							</label>
						</div>
						<div class="radio radio-info">
							<label>
								<input type="radio" class="checkbox" name="tipo" value="2">
								<span class="circle"></span><span class="check"></span>
								Inferior
							</label>
						</div>
						<button class="btn btn-success btn-xs" style="margin-top:1em;margin-bottom:1em;">Enviar</button>
					</form>
				</div>
				<div class="bg-primary textoPromedio contOptionA" style="padding:0.5em;">
					<div class="col-xs-12">
						<a href="#" class="optionA" data-toggle="collapse" data-target=".multiple" style="color:white;">Multiples slide </a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="multiple imagesSlidesOption textoPromedio collapse">
					<select class="postion form-control" style="margin-bottom:2em;">
						<option value="" selected>Seleccione una opción...</option>
						<option value="1" >Superior</option>
						<option value="2">Inferior</option>
					</select>
						
				    <br>
					<span class="btn btn-success fileinput-button">
				        <i class="glyphicon glyphicon-plus"></i>
				        <span>Agregar archivo...</span>
				        <!-- The file input field used as target for the file upload widget -->
				        <input id="fileupload" type="file" name="files[]" multiple>
				    </span>
				    <div class="table table-striped" class="files" id="previews">

					  <div id="template" class="file-row">
					    <!-- This is used as the file preview template -->
					    <div class="preview-img">
					        <span class="preview dropzone-previews"><img data-dz-thumbnail /></span>
					    </div>
					    <div>
					        <p class="name" data-dz-name></p>
					        <strong class="error text-danger" data-dz-errormessage></strong>
					    </div>
					    <div>
					        <p class="size" data-dz-size></p>
					        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
					          <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
					        </div>
					    </div>
					    <div>
					      <button class="btn btn-primary start">
					          <i class="glyphicon glyphicon-upload"></i>
					          <span>Subir</span>
					      </button>
					      <button data-dz-remove class="btn btn-warning cancel">
					          <i class="glyphicon glyphicon-ban-circle"></i>
					          <span>Cancelar</span>
					      </button>
					      <button data-dz-remove class="btn btn-danger delete">
					        <i class="glyphicon glyphicon-trash"></i>
					        <span>Borrar</span>
					      </button>
					    </div>
					  </div>

					</div>	
                    <br>
                    <a href="{{ URL::to('administrador/editar-slides') }}" class="btn btn-xs btn-success" style="margin-top:1em;margin-bottom:1em;">Continuar</a>	

				</div>
				
			                
				<div class="bg-primary textoPromedio volver" style="padding:0.5em;margin-top:1em;">
					
					<div class="col-xs-12">
						<a href="#"style="color:white;">Volver</a>
					</div>
					<div class="clearfix"></div>
				</div>

			</div>
		</div>
	</div>
</div>
@stop
