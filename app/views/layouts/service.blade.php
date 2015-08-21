<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="en">
	<head>
		
		<meta charset="utf-8" />
		<title>{{ $title }}</title>
		<meta keywords="tecnographic,paginas web,creacion de paginas web,diseño de paginas web,creacion de paginas web maracay, diseño de paginas web maracay,paginas web maracay">
		<meta name="description" content="{{$meta}}">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Tecnographic Venezuela">
		<link rel="icon" type="image/png" href="{{URL::to('images/favicon-01.png')}}" />
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/bootstrap-theme.css') }}
		{{ HTML::style('css/materialize.min.css') }}
		{{ HTML::style('css/custom-service.css') }}
	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-57229555-1', 'auto');
		ga('send', 'pageview');
		</script>

	</head>
	<body>
		<nav>
			<div class="nav-wrapper subMenu">
				<a href="{{ URL::to('/') }}" class="brand-logo"><img src="{{ asset('images/logo.png') }}" class="logo"></a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li class="waves-effect waves-light">
						<a href="../#home" class="subMenuBtn"><h4>{{ Lang::get('lang.menu_title1') }}</h4><h6 class="subtitulo">{{ Lang::get('lang.menu_subtitle1') }}</h6></a>
					</li>
					<li class="waves-effect waves-light">
						<a href="../#about" class="subMenuBtn"><h4>{{ Lang::get('lang.menu_title2') }}</h4><h6 class="subtitulo">{{ Lang::get('lang.menu_subtitle2') }}</h6></a>
					</li>
					<li class="waves-effect waves-light">
						<a href="../#project" class="subMenuBtn"><h4>{{ Lang::get('lang.menu_title3') }}</h4><h6 class="subtitulo">{{ Lang::get('lang.menu_subtitle3') }}</h6></a>
					</li>
					<li class="waves-effect waves-light">
						<a href="../#news" class="subMenuBtn"><h4>{{ Lang::get('lang.menu_title4') }}</h4><h6 class="subtitulo">{{ Lang::get('lang.menu_subtitle4') }}</h6></a>
					</li>
					<li class="waves-effect waves-light">
						<a href="../#contact" class="subMenuBtn"><h4>{{ Lang::get('lang.menu_title5') }}</h4><h6 class="subtitulo">{{ Lang::get('lang.menu_subtitle5') }}</h6></a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="nav-movil">
			<ul class="right hide-on-med-and-down">
				<li><a href="#!">First Sidebar Link</a></li>
				<li><a href="#!">Second Sidebar Link</a></li>
			</ul>
			<ul id="slide-out" class="side-nav row">
				<a href="{{ URL::to('/#home') }}" class="btn btn-flat waves-effect subMenuBtn">
					<li class="">
						<h4><i class="fa fa-2x fa-icon-movil-service my-fa fa-laptop"></i> {{ Lang::get('lang.menu_title1') }}</h4>
					</li>
				</a>
				<a href="{{ URL::to('/#about') }}" class="btn btn-flat waves-effect subMenuBtn">
					<li class="">
						<h4><i class="fa fa-2x fa-icon-movil-service my-fa fa-pencil-square-o"></i> {{ Lang::get('lang.menu_title2') }}</h4>
					</li>
				</a>
				<a href="{{ URL::to('/#project') }}" class="btn btn-flat waves-effect subMenuBtn">
					<li class="">
						<h4><i class="fa fa-2x fa-icon-movil-service my-fa fa-print"></i> {{ Lang::get('lang.menu_title3') }}</h4>
					</li>
				</a>
				<a href="{{ URL::to('/#news') }}" class="btn btn-flat waves-effect subMenuBtn">
					<li class="">
						<h4><i class="fa fa-2x fa-icon-movil-service my-fa fa-file-image-o"></i> {{ Lang::get('lang.menu_title4') }}</h4>
					</li>
				</a>
				<a href="{{ URL::to('/#contact') }}" class="btn btn-flat waves-effect subMenuBtn">
					<li class="">
						<h4><i class="fa fa-2x fa-icon-movil-service my-fa fa-camera"></i> {{ Lang::get('lang.menu_title5') }}</h4>
					</li>
				</a>
			</ul>
			<a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
		</div>
		@yield('content')
		<div class="row footerContenedor">
			<footer>
				<div class="col s12 m6 l6">
					<p class="textoPromedio">Rif: J-40488576-5</p>
				</div>
				<div class="col s12 m6 l6">
					<p class="textoPromedio">Copyright <i class="fa fa-copyright"></i> 2014. Tecnographic Venezuela. {{Lang::get('lang.copyright') }}</p>
				</div>
			</footer>
		</div>
	 	<div class="selectLang">
	      	<form method="POST" action="{{ URL::to('cambiar-lenguaje') }}" class="changeLang">
			    <select class="form-control selLang" name="lang" autocomplete="off">
	    			@if(is_null($lang) || $lang == 'es')
	      				<option value="es" selected>{{Lang::get('lang.lang_es') }}</option>
	      				<option value="en" >{{Lang::get('lang.lang_en') }}</option>
	      			@elseif(!is_null($lang) && $lang == 'en')
	      				<option value="es" >{{Lang::get('lang.lang_es') }}</option>
	      				<option value="en" selected>{{Lang::get('lang.lang_en') }}</option>
	      			@endif
			    </select>
	      	</form>
		  </div>   
	</body>

 	{{ HTML::script('js/jquery.min.js') }}
 	{{ HTML::script('js/jquery.nicescroll.js') }}
 	{{ HTML::script('js/bootstrap.min.js') }}
 	{{ HTML::script('js/materialize.min.js') }}
 	{{ HTML::script('js/slick/slick.min.js') }}
 	{{ HTML::style('js/slick/slick.css') }}
 	{{ HTML::style('js/slick/slick-theme.css') }}


 	<!-- Add mousewheel plugin (this is optional) -->
 	{{ HTML::script('js/fancybox/lib/jquery.mousewheel.js') }}

	<!-- Add fancyBox -->
	{{ HTML::style('js/fancybox/source/jquery.fancybox.css?v=2.1.5',array('media' => 'screen')) }}
	{{ HTML::script('js/fancybox/source/jquery.fancybox.pack.js?v=2.1.5') }}

	<!-- Optionally add helpers - button, thumbnail and/or media -->
	{{ HTML::style('js/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5',array('media' => 'screen')) }}
	
	{{ HTML::script('js/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5') }}
	{{ HTML::script('js/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6') }}
	{{ HTML::script('js/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7') }}
	{{ HTML::style('js/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7',array('media' => 'screen')) }}
	

 	{{ HTML::script('js/custom-service.js') }}

    @yield('postscript')
  	<script type="text/javascript">
  		jQuery(document).ready(function($) {
  				$("html").niceScroll({horizrailenabled:false});
  			 $(".button-collapse").sideNav();
  		});

  	</script>
	
</html>