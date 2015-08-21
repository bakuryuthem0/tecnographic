@extends('layouts.main')

@section('content')
<div class="contLoading valign-wrapper">
	<img src="{{ asset('images/loader.png')}}" class="loadingInBlack loading">
</div>
<div class="contenedorsote"><div id="collapse-about" class="row collapsed waves-effect" data-toggle="collapse" data-target=".about">
	<div class="col s3 rojo">
		<i class="fa fa-5x fa-icon-movil my-fa fa-laptop"></i>
	</div>	
	<div class="col s9 ">
		<div class="table-cell">
			<h3>{{ Lang::get('lang.title_1') }}</h3><h5>{{ Lang::get('lang.menu_subtitle2') }}</h5>
		</div>
	</div>
</div>
<div class="row about">
	<div class="container">
		<div class="col m12 l6 titulos contCentrado">
			<h1>{{ Lang::get('lang.title_1') }}</h1>
			<h3>{{ Lang::get('lang.menu_subtitle2') }}</h3>
		</div>
		<div class="col s12" style="margin-top: 5em;">
			<div class="col s12 m6 contAbout1">
				<div class="about1">
					<h3><strong class="tgvnzla">Tecnographic Venezuela</strong></h3>
					<p class="textoPromedio">{{ Lang::get('lang.about_text1') }}</p>
					<p class="textoPromedio">
						{{ Lang::get('lang.about_text2') }}
					</p>
					<p class="textoPromedio">{{ Lang::get('lang.about_text3') }}<strong>Tecnographic</strong>
					{{ Lang::get('lang.about_text4') }}</p>
				</div>
			</div>
			<div class="col s12 m6 contAbout1">
				<div class="about1 textoPromedio">
					<h3 style="font-size:2.5em;"><strong>{{ Lang::get('lang.subtitle_1') }}</strong></h3>
					<p>{{ Lang::get('lang.about_text4') }}</p>
					<h3 style="font-size:2.5em;"><strong>{{ Lang::get('lang.subtitle_2') }}</strong></h3>
					<p>{{ Lang::get('lang.about_text5') }}</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="collapse-project" class="row collapsed waves-effect" data-toggle="collapse" data-target=".project">
	<div class="col s3 azul">
		<i class="fa fa-5x fa-icon-movil my-fa fa-pencil-square-o"></i>
	</div>	
	<div class="col s9 ">
		<div class="table-cell">
			<h3>{{ Lang::get('lang.title_2') }}</h3><h5>{{ Lang::get('lang.menu_subtitle3') }}</h5>
		</div>
	</div>
</div>
<div class="row project" >
	<div class="container">
		<div class="col m12 l6 titulos contCentrado">
			<h1>{{ Lang::get('lang.title_2') }}</h1>
			<h3>{{ Lang::get('lang.menu_subtitle3') }}</h3>
		</div>
		<div class="col s12" style="margin-bottom:2em;text-align:center;margin-top:5em;">
			@foreach($servicios as $s)
				<div class="col s12 m6 l4">
					<a href="{{ URL::to('servicios/'.$s->id) }}">
						<div class="servicio" data-clase="{{ $s->alt }}" >
							<div class="col s12 tableServ">
								<div class="col valign-wrapper s4">
										<i class="fa fa-5x my-fa {{ $s->icono }}"></i>
								</div>
								<div class="col s8">
									<div class="col s12">
										<p class="textoPromedio serviciosText" style="text-align:left;">
												<h5>
													<strong>
														@if(is_null($lang) || $lang == 'es')
															{{ $s->nombre }}
										      			@elseif(!is_null($lang) && $lang == 'en')
										      				{{ $s->nombre_eng }}
										      			@endif
													</strong>
												</h5>
										</p>
									</div>
									<div class="col s12" style="padding:0px;float:right;">
										<p class="textoPromedio serviciosText" style="text-align:left;">
											@if(is_null($lang) || $lang == 'es')
												@if(strlen($s->servicios_desc) > 100)
													{{ substr($s->servicios_desc,0,100) }}...
												@else
													{{ $s->servicios_desc }}
												@endif
							      			@elseif(!is_null($lang) && $lang == 'en')
							      				@if(strlen($s->servicios_desc_eng) > 100)
													{{ substr($s->servicios_desc_eng,0,100) }}...
												@else
													{{ $s->servicios_desc_eng }}
												@endif
							      			@endif
										</p>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			@endforeach
			
		</div>
	</div>
</div>
<div class="row agency">
	<div class="container">
		<div class="col s12">
			<h2>{{ Lang::get('lang.title_3') }}</h2>
		</div>
		<div class="col s12">
			<p class="textoPromedio"><strong>Tecnographic de Venezuela, C.A.</strong>, {{ Lang::get('lang.agency_text1') }}.</p>
			<p class="textoPromedio">
				{{ Lang::get('lang.agency_text2') }}
			</p>
		</div>
		<div class="col s12">
			<div class="col s12 m8 textAgency">
				<p class="textoPromedio"><strong>Tecnographic de Venezuela, C.A.</strong>, {{ Lang::get('lang.agency_text3') }}</p>
				<p class="textoPromedio">
				{{ Lang::get('lang.agency_text4') }}</p>
			</div>
		</div>
	</div>
</div>
<div id="collapse-news" class="row collapsed waves-effect" data-toggle="collapse" data-target=".news">
	<div class="col s3 verde">
		<i class="fa fa-5x fa-icon-movil my-fa fa-print"></i>
	</div>	
	<div class="col s9 ">
		<div class="table-cell">
			<h3>{{ Lang::get('lang.title_4') }}</h3><h5>{{ Lang::get('lang.menu_subtitle4') }}</h5>
		</div>
	</div>
</div>
<div class="row news" >
	<div class="container">
		<div class="col m12 l6 titulos contCentrado">
			<h1>{{ Lang::get('lang.title_4') }}</h1>
			<h3>{{ Lang::get('lang.menu_subtitle4') }}</h3>
		</div>
		<div class="button-group filters-button-group">
			<button  data-filter="*" class="btn filtro waves-effect">{{ Lang::get('lang.btn_porta1') }}</button>
			<button  data-filter=".diseno_web" class="btn filtro waves-effect">{{ Lang::get('lang.btn_porta2') }}</button>
			<button  data-filter=".diseno_grafico" class="btn filtro waves-effect">{{ Lang::get('lang.btn_porta3') }}</button>
			<button  data-filter=".aplicacion_movil" class="btn filtro waves-effect">{{ Lang::get('lang.btn_porta4') }}</button>
		</div>
		<div class="row rowPorta">
			<div class="contPorta">
				<div class="porta-item  diseno_web">
					<img class="" src="images/picNews/paqina web peluqueria-01.jpg"/>
					<div class="portaText ">
						<legend><h3>Titulo</h3></legend>
						<p class="textoPromedio">Texto de relleno</p>
						<p class="textoPromedio">{{ Lang::get('lang.btn_porta5') }} <i class="fa fa-search"></i></p>
					</div>
				</div>
				<div class="porta-item  diseno_web">
					<img class="" src="{{ asset('images/picNews/dark_souls_13-t2.jpg') }}"/>
					<div class="portaText ">
						<legend><h3>Titulo</h3></legend>
						<p>Texto de relleno</p>
						<p>{{ Lang::get('lang.btn_porta5') }} <i class="fa fa-search"></i></p>
					</div>
				</div>
				<div class="porta-item  diseno_grafico">
					<img class="" src="{{ asset('images/picNews/dark_souls_ii_scholar_of_the_first_sin-t2.jpg') }}"/>
					<div class="portaText ">
						<legend><h3>Titulo</h3></legend>
						<p class="textoPromedio">Texto de relleno</p>
						<p class="textoPromedio">{{ Lang::get('lang.btn_porta5') }} <i class="fa fa-search"></i></p>
					</div>
				</div>
				<div class="porta-item  aplicacion_movil">
					<img class="" src="{{ asset('images/picNews/fallout_4_vault-t2.jpg') }}"/>
					<div class="portaText ">
						<legend><h3>Titulo</h3></legend>
						<p class="textoPromedio">Texto de relleno</p>
						<p class="textoPromedio">{{ Lang::get('lang.btn_porta5') }} <i class="fa fa-search"></i></p>
					</div>
				</div>
				<div class="porta-item  diseno_web">
					<img class="" src="{{ asset('images/picNews/nativo.jpg') }}"/>
					<div class="portaText ">
						<legend><h3>Titulo</h3></legend>
						<p class="textoPromedio">Texto de relleno</p>
						<p class="textoPromedio">{{ Lang::get('lang.btn_porta5') }} <i class="fa fa-search"></i></p>
					</div>
				</div>
				<div class="porta-item  diseno_grafico">
					<img class="" src="{{ asset('images/picNews/ricardopava.jpg') }}"/>
					<div class="portaText ">
						<legend><h3>Titulo</h3></legend>
						<p class="textoPromedio">Texto de relleno</p>
						<p class="textoPromedio">{{ Lang::get('lang.btn_porta5') }} <i class="fa fa-search"></i></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row redes">
	<div class="carousel">
		@foreach($slidesInf as $s)
		<div class="front">
			<img src="{{ asset('images/slides-top/'.$s->image) }}">
		</div>
		@endforeach
	</div>
	<div class="contRedes">
		<img src="{{ asset('images/redes.png') }}">
		<div class="contTextRedes">
			<h2>{{ Lang::get('lang.title_5') }}</h2>
			<ul class="ulRedes">
				<li><h2>+58 (0424) 355.71.53</h2></li>
				<li><h2>+58 (0423) 431.26.99</h2></li>
			</ul>
			<div>
				<div class="redMarco">
					<i class="fa fa-facebook-official redIcon"></i>
				</div>
				<div class="redMarco">
					<i class="fa fa-twitter redIcon"></i>
				</div>
				<div class="redMarco">
					<i class="fa fa-google-plus redIcon"></i>
				</div>
				<div class="redMarco">
					<i class="fa fa-instagram redIcon"></i>
				</div>
				
			</div>
		</div>
	</div>
</div>
<div id="collapse-contact" class="row collapsed waves-effect" data-toggle="collapse" data-target=".contact">
	<div class="col s3 azul_clarito">
		<i class="fa fa-5x fa-icon-movil my-fa fa-file-image-o"></i>
	</div>	
	<div class="col s9 ">
		<div class="table-cell">
			<h3>{{ Lang::get('lang.title_6') }}</h3><h5>{{ Lang::get('lang.menu_subtitle5') }}</h5>
		</div>
	</div>
</div>
<div class="row contact" >
	<div class="container">
		<div class="col m12 l6 titulos contCentrado">
			<h1>{{ Lang::get('lang.title_6') }}</h1>
			<h3>{{ Lang::get('lang.menu_subtitle5') }}</h3>
		</div>
		<div class="col s12">
			<h3 class="textoGrande">
			{{ Lang::get('lang.footer_text1') }}
			</h3>
		</div>
		<div class="col s12 m12 l6 cont contactusBot">
			<ul class="ulContact textoGrande">
				<li class=""><i class="fa fa-envelope"></i> tecnographicvenezuela@gmail.com</li>
				<li class=""><i class="fa fa-skype"></i> Tecnographic Venezuela</li>
				<li class=""><i class="fa fa-comments"></i> {{ Lang::get('lang.footer_text2') }}</li>
			</ul>
			<div class="col s12" style="paddig:0;">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125629.77593697135!2d-67.60541045!3d10.26718390000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e803c989377fe87%3A0xb5ff524dadae5b74!2sMaracay!5e0!3m2!1ses-419!2sve!4v1434394978178" width="500" height="275" frameborder="1" style="border:1"></iframe>
			</div>
		</div>
		<div class="col s12 m12 l6">
			<h3 class="textoGrande please">{{ Lang::get('lang.footer_text3') }}</h3>
			<div class="alert alert-success responseDanger">
			</div>
			<div class="input-field">
				<i class="prefix fa fa-user"></i>
				<input id="name" type="text" class="validate formInput name" data-toggle="popove" data-trigger="manual" data-title="Atención" data-placement="right" name="name" required>
				<label for="name" >{{ Lang::get('lang.footer_form1') }}*</label>
			</div>
			<div class="input-field">
				<i class="prefix fa fa-envelope"></i>
				<input id="email" type="email" class="validate formInput email" data-toggle="popove" data-trigger="manual" data-title="Atención" data-placement="right" name="email">
				<label for="email">{{ Lang::get('lang.footer_form2') }}*</label>
			</div>
			<div class="input-field">
				<i class="prefix fa fa-globe"></i>
				<input id="pais" type="text" class="validate formInput pais" data-toggle="popove" data-trigger="manual" data-title="Atención" data-placement="right" name="pais" required>
				<label for="pais" >{{ Lang::get('lang.footer_form3') }}*</label>
			</div>
			<div class="input-field">
				<i class="prefix fa fa-suitcase"></i>
				<input id="proy" type="text" class="validate formInput proy" data-toggle="popove" data-trigger="manual" data-title="Atención" data-placement="right" name="proy" required>
				<label for="proy" >{{ Lang::get('lang.footer_form4') }}*</label>
			</div>
			<div class="input-field">
				<i class="prefix fa fa-pencil-square-o"></i>
				<input id="subject" type="text" class="validate formInput subject" data-toggle="popove" data-trigger="manual" data-title="Atención" data-placement="right" name="subject">
				<label for="subject">{{ Lang::get('lang.footer_form5') }}*</label>
			</div>
			<div class="input-field">
				<i class="prefix fa fa-comments"></i>
				<textarea type="text" class="materialize-textarea formInput message" data-toggle="popove" data-trigger="manual" data-title="Atención" data-placement="right" name="message" rows="7"></textarea>
				<label for="message">{{ Lang::get('lang.footer_form6') }}*</label>
			</div>
			<div class="cBtn col s12" style="padding-left: 0px;">
				<ul class="ulContact" style="padding-left: 0px;">
					<li class="btn waves-effect clear btn-material-blue-grey-50"><i class="fa fa-eraser"></i>
						<span>{{ Lang::get('lang.footer_form7') }}</span>
					</li>
					<li class="btn waves-effect send btn-material-blue-grey-50"><i class="fa fa-paper-plane"></i>
						<span>{{ Lang::get('lang.footer_form8') }}</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div></div>
@stop