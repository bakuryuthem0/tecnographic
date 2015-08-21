<?php

class ServiceController extends BaseController {


	public function getService($id)
	{
		$all = Servicios::get();
		$serv = Servicios::find($id);
		$servicio = ContServ::where('id_serv','=',$id)->get();
		$title = 'Servicios | Tecnographic Venezuela';
		$meta = "Ofrecemos la mayor calidad en desarrollo de paginas web, ademas de servicios de imagen corporativa de exelente calidad";
		return View::make('home.servicios')
		->with('contServ',$servicio)
		->with('serv',$serv)
		->with('title',$title)
		->with('meta',$meta)
		->with('all',$all)
		->with('lang',Session::get('language'));

	}
	public function postMobilService()
	{
		if (Request::ajax()) {
			$id = Input::get('id');
			$serv = Servicios::find($id);
			$servicio = ContServ::where('id_serv','=',$id)->get();
			return Response::json(array('serv' => $serv->toArray(),'contserv' => $servicio->toArray()));
		}
	}
	public function postService()
	{
		if (Request::ajax()) {
			$id = Input::get('id');
			$servicio = ContServ::find($id);
			if(!Session::has('language') || Session::get('language') == 'es')
			{
				return Response::json(
					array('success' => true,
							'nombre'=> $servicio->nombre,
							'title' => $servicio->title,
							'desc'  => $servicio->desc,
							'meta'  => strip_tags($servicio->desc),
							'img1'  => asset('images/serv/'.$servicio->img_1),
							'img2'  => asset('images/serv/'.$servicio->img_2)
						)
					);
			}
  			elseif(Session::has('language') && Session::get('language') == 'en')
  			{
  				return Response::json(
					array('success' => true,
							'nombre'=> $servicio->nombre_eng,
							'title' => $servicio->title,
							'desc'  => $servicio->desc_eng,
							'meta'  => strip_tags($servicio->desc),
							'img1'  => asset('images/serv/'.$servicio->img_1),
							'img2'  => asset('images/serv/'.$servicio->img_2)
						)
					);
  			}

		}else
		{
			return Response::json(array(
					'success' => false,
					'message' => 'ups hubo un error.'
				));
		}
	}

}