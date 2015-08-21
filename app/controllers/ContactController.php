<?php

class ContactController extends BaseController {

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

	public function postContact()
	{
		if (Request::ajax()) {
			$inp = Input::all();
			$rules1 = array(
				'name' => 'required',
				'email'=> 'required|email',
				'proy'=> 'required',
				'pais'=> 'required',
				'subject'=> 'required',
				'messagex'=> 'required'
			);
			$val1 = Validator::make($inp, $rules1);
			if ($val1->fails()) {
				return Response::json()->withError;
			}
			$subject = "Correo de contacto";
			$to_Email = 'tecnographicvenezuela@gmail.com';
			date_default_timezone_set('America/Caracas');
			$data = array_merge($inp,array('fecha' => date('d-m-Y')));

			Mail::send('emails.contacto', $data, function($message) use ($to_Email,$subject)
			{
				$message->to($to_Email)->from('sistema@tecnographic.com.ve')->subject($subject);
			});
			return Response::json(array('cod' => 2));
		}
	}

}
