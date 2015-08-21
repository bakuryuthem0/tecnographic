<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $title }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

      {{ HTML::style('css/bootstrap.min.css') }}
      {{ HTML::style('css/bootstrap-theme.css') }}
      {{ HTML::style('css/custom-admin.css') }}
      {{ HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}
    </head>
    <body class="admin">
        <header class="admin">
            <nav class="navbar navbar-default" style="position:initial;">
              <div class="container-fluid container-fluid-admin">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="col-xs-2">
                  <a href="{{ URL::to('administrador/inicio') }}"><img src="{{ asset('images/admin/logo-01.png') }}" class="logo2"></a>
                </div>

                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
               
               <div class="navbar-collapse adminlayout" id="bs-example-navbar-collapse-1 col-xs-3">
                @if(!Auth::check())
                <h3 class="titulo-admin">Bienvenido (a)<br>Al Centro De Administración De Tecnographic Venezuela C.A.</h3>
                @else
                  <ul class="nav navbar-nav">
                   <li class="dropdown myMenu">
                      <a href="#" class="dropdown-toggle textoPromedio" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-cogs"></i>
                          Servicios
                        <span class="caret"></span>
                       </a>
                       <ul class="dropdown-menu multi-level" role="menu">
                        <li class="dropdown-submenu textoNegro">
                            <a href="#!">
                              Nuevo servicio (Proximamente)
                            </a>
                        </li>
                        <li class="dropdown-submenu">
                          <a href="{{ URL::to('administrador/editar-servicios') }}">
                            Editar servicios
                          </a>
                        </li> 
                        <li class="dropdown-submenu textoNegro">
                            <a href="#!">
                              Nuevo Sub-servicio (Proximamente)
                            </a>
                        </li>
                        <li class="dropdown-submenu">
                          <a href="{{ URL::to('administrador/editar-sub-servicios') }}">
                            Editar Sub-servicios
                          </a>
                        </li> 
                      </ul>
                    </li>
                    <li class="dropdown myMenu">
                      <a href="#" class="dropdown-toggle textoPromedio" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-picture-o"></i>
                          Pagina
                        <span class="caret"></span>
                       </a>
                      <ul class="dropdown-menu multi-level" role="menu">
                        <li class="dropdown-submenu textoNegro">
                            <a href="{{ URL::to('administrador/nuevo-slide') }}">
                              Nuevo slide
                            </a>
                        </li>
                        <li class="dropdown-submenu">
                          <a href="{{ URL::to('administrador/editar-slides') }}">
                            Editar slides
                          </a>
                        </li> 
                      </ul>
                    </li>
                    <li class="textoPromedio "><a href="{{ URL::to('cerrar-sesion') }}" class="logout textoNegro">Cerrar sesión</a></li>
                  </ul>
                @endif

                </div>
                
              </div><!-- /.container-fluid -->
            </nav>
        </header>
    @yield('content')
       {{ HTML::script('js/jquery.min.js') }}
        <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
       {{ HTML::script('js/bootstrap.min.js') }}
       
       {{ HTML::script('js/dropzone.js') }}

       {{ HTML::script('js/custom-admin.js') }} 
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-57229555-1', 'auto');
          ga('send', 'pageview');

        </script>
       @yield('postscript')
    </body>
</html>