<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{

		$title = 'Tecnographic Venezuela | diseño y desarrollo de paginas web,imagen corporativa y sistemas administrativos';
		$meta = "Somos una empresa de diseño y desarrollo de paginas web en la ciudad de maracay";
		$href = array('#home','#about' ,'#project','#news','#contact');
		$servicios = Servicios::get();
		$slidesSup = Slides::where('tipo','=',1)->where('activo','=',1)->where('deleted','=',0)->get();
		$slidesInf = Slides::where('tipo','=',2)->where('activo','=',1)->where('deleted','=',0)->get();
		return View::make('home.index')
		->with('title',$title)
		->with('href',$href)
		->with('meta',$meta)
		->with('servicios',$servicios)
		->with('slidesSup',$slidesSup)
		->with('slidesInf',$slidesInf)
		->with('lang',Session::get('language'));
	}
	public function changeLang()
	{
		$lang = Input::get('lang');
		Session::set('language', $lang);
		return Redirect::back();
	}
}
