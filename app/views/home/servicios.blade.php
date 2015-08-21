@extends('layouts.service')

@section('content')
<div class="contLoading valign-wrapper">
	<img src="{{ asset('images/loader.png')}}" class="loadingInBlack loading">
</div>
<div class="ubicaciondepaginaaparte"></div>
<div id="pagina_aparte" class="{{ $serv->alt }} row" data-target-pos="{{ $serv->alt }}" data-id-set="{{ $serv->id }}">
	<div class="container">
		<div class="row">
			<!-- filter_block -->
				
			<div class="col s12" data-animated="fadeIn" style="margin-top:2em;">	
				<div class="col s12">
					<h3 class="h_titulo">
						@if(is_null($lang) || $lang == 'es')
							{{ $serv->nombre }}
		      			@elseif(!is_null($lang) && $lang == 'en')
		      				{{ $serv->nombre_eng }}
		      			@endif
					</h3>
				</div>
			</div>  
			<div class="col s12" style="margin-top:2em;">
				<aside id="desc" class="col s12 m6 contMitad">
					<div id="text" class="col s12">
						<p class="text_description textoPromedio">
							@if(is_null($lang) || $lang == 'es')
								{{ $serv->servicios_desc }}
			      			@elseif(!is_null($lang) && $lang == 'en')
								{{ $serv->servicios_desc_eng }}
			      			@endif
						</p>
					</div>
				</aside>

				<div id="cont_trio" class="col s12 m6 contMitad">
					<aside id="mini_slider" class="mySlide">
						<div><img src="{{ asset('images/serv/'.$serv->img_1) }}" class="img1"></div>
						<div><img src="{{ asset('images/serv/'.$serv->img_2) }}" class="img2"></div>
					</aside>
				</div>
				
			</div>
		</div>	
		<div class="row">
			<div class="col s12">
				<div class="col s12 m6 contCatalogo" style="margin-top:2em;">
					<a href="{{ $serv->catalogo }}" target="_blank" class="catalogo btn btn-catalogo waves-effect">Catalogo</a>
				</div>
				<div class="col s12" style="margin-top:2em;">
				</div>
			</div>
		</div>		
		<div class="row">
			<div class="col s12">
					<ul class="ulContact" style="padding-left: 0px;">
						<li class="btn clear btn-ini">
							
							<a class="selected ini" href="{{ URL::to('servicios/'.$serv->id) }}" style="text-decoration:none;">Inicio</a>
						</li>

						@foreach($contServ as $cs)
							<a class="serv_mini" href="#." id="{{ $cs->title }}" data-option-value="{{ $cs->id }}">
								<li class="btn clear btn-serv waves-effect" style="margin-bottom:1em;">
									{{ $cs->nombre }}
								</li>
							</a>
						@endforeach
					</ul>
			</div>
		</div>
	</div>
</div>
<div class="contenedorsote">
	@foreach($all as $s)
	<div id="collapse-diseno-web" class="collapse-navigation-service row btn btn-flat waves-effect 
		@if($s->id == 1)
			rojo
		@elseif($s->id == 2)
			azul
		@elseif($s->id == 3)
			verde
		@elseif($s->id == 4)
			azul_clarito
		@elseif($s->id == 5)
			amarillo
		@elseif($s->id == 6)
			light-blue darken-4
		@endif" 
		data-toggle="collapse" data-target="#{{ $s->alt }}" data-servicio-id="{{ $s->id }}">
				<div class="col s3 valign-wrapper">
					<i class="fa fa-5x fa-icon-movil-service my-fa {{ $s->icono }}"></i>
				</div>	
		<div class="col s9 valign-wrapper">
			<h4>
				@if(is_null($lang) || $lang == 'es')
					{{ $s->nombre }}
      			@elseif(!is_null($lang) && $lang == 'en')
      				{{ $s->nombre_eng }}
      			@endif
			</h4>
		</div>
		<div class="ripple-wrapper"></div>
	</div>
	<div id="{{ $s->alt }}" class="collapse"></div>
	@endforeach
</div>

@stop

@section('postscript')

<script type="text/javascript">
				$('.mySlide').slick({
					adaptiveHeight: false,
					autoplay		: true,
					autoplaySpeed : 5000,
					fade: true,
					cssEase: 'linear',
					dots: true,
					infinite: true,
					speed: 300,
					slidesToShow: 1,
				});
				$('.fade').slick()
				
				/*$('.fade').slick({
				  dots: true,
				  infinite: true,
				  speed: 500,
				  fade: true,
				  cssEase: 'linear',
				  adaptiveHeight: true,
				  autoplay		: true,
				  autoplaySpeed : 5000
				});
				*/
			

			

			
		</script>
@stop