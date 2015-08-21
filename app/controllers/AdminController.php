<?php
class AdminController extends Controller {
	public function upload_img($tab,$file,$pos)
	{
		if (file_exists('images/serv/'.$file->getClientOriginalName())) {
			//guardamos la imagen en public/imgs con el nombre original
            $i = 0;//indice para el while
            //separamos el nombre de la img y la extensión
            $info = explode(".",$file->getClientOriginalName());
            //asignamos de nuevo el nombre de la imagen completo
            $miImg = $file->getClientOriginalName();
            //mientras el archivo exista iteramos y aumentamos i
            while(file_exists('images/serv/'.$miImg)){
                $i++;
                $miImg = $info[0]."(".$i.")".".".$info[1];              
            }
            //guardamos la imagen con otro nombre ej foto(1).jpg || foto(2).jpg etc
            $file->move("images/serv/",$miImg);

            if($miImg != $file->getClientOriginalName()){
            	if ($pos == 1) {
	            	$tab->img_1 = $miImg;
            	}else
            	{
            		$tab->img_2 = $miImg;
            	}
            }
		}else
		{
			$file->move("images/serv/",$file->getClientOriginalName());
			if ($pos == 1) {
            	$tab->img_1 =  $file->getClientOriginalName();;
        	}else
        	{
        		$tab->img_2 =  $file->getClientOriginalName();;
        	}
		}
	}
	public function upload_catalogo($tab,$file)
	{
		if (file_exists('docs/'.$file->getClientOriginalName())) {
			//guardamos la imagen en public/imgs con el nombre original
            $i = 0;//indice para el while
            //separamos el nombre de la img y la extensión
            $info = explode(".",$file->getClientOriginalName());
            //asignamos de nuevo el nombre de la imagen completo
            $miDoc = $file->getClientOriginalName();
            //mientras el archivo exista iteramos y aumentamos i
            while(file_exists('docs/'.$miDoc)){
                $i++;
                $miDoc = $info[0]."(".$i.")".".".$info[1];              
            }
            //guardamos la imagen con otro nombre ej foto(1).jpg || foto(2).jpg etc
            $file->move("docs/",$miDoc);

            if($miDoc != $file->getClientOriginalName()){
            	$tab->catalogo = $miDoc;
            	
            }
		}else
		{
			$file->move("docs/",$file->getClientOriginalName());
        	$tab->catalogo =  $file->getClientOriginalName();;
		}
	}
	public function getLogin()
	{
		Session::set('language','es');
		$title = 'Login';
		return View::make('admin.login')
		->with('title',$title);
	}
	public function postLogin()
	{

		$input = Input::all();
		if (isset($input['remember'])) {
			$valor = true;
		}else
		{
			$valor = false;
		}
		$find = User::where('username','=',$input['username'])->pluck('user_deleted');
		if ($find == 1) {
			Session::flash('error', 'Su usuario ha sido eliminado, para más información contáctenos desde nuestro módulo de contacto.');
			return Redirect::to('iniciar-sesion');
		}
		$userdata = array(
			'username' 	=> $input['username'],
			'password' 	=> $input['password']

		);
		if (Auth::attempt($userdata,$valor)) {
				return Redirect::to('administrador/inicio');	
		}else
		{
			Session::flash('error', 'Usuario o contraseña incorrectos');
			return Redirect::to('administrador');
		}
		
	}
	public function getIndex()
	{
		$title = 'administrador';
		return View::make('admin.inicio')
		->with('title',$title);
	}

	public function getNewSlide()
	{
		$title = "Nuevo slide";
		return View::make('admin.newSlide')->with('title',$title);
	}
	public function postNewSlide()
	{

		$input = Input::all();

		$rules = array(
		    'img' => 'required|image|max:3000',
		    'tipo'=> 'required'
		);
		$messages = array(
			'image' => 'Todos los archivos deben ser imagenes',
			'max'	=> 'Las imagenes deben ser de menos de 3Mb',
			'required' => 'Todos los campos son obligatorios'
		);
		$validation = Validator::make($input, $rules, $messages);

		if ($validation->fails())
		{
			return Redirect::to('administrador/nuevo-slide')->withErrors($validation);
		}
		$file = Input::file('img');
		$tipo = Input::get('tipo');
		$images = new Slides;
		if (file_exists('images/slides-top/'.$file->getClientOriginalName())) {
			//guardamos la imagen en public/imgs con el nombre original
            $i = 0;//indice para el while
            //separamos el nombre de la img y la extensión
            $info = explode(".",$file->getClientOriginalName());
            //asignamos de nuevo el nombre de la imagen completo
            $miImg = $file->getClientOriginalName();
            //mientras el archivo exista iteramos y aumentamos i
            while(file_exists('images/slides-top/'.$miImg)){
                $i++;
                $miImg = $info[0]."(".$i.")".".".$info[1];              
            }
            //guardamos la imagen con otro nombre ej foto(1).jpg || foto(2).jpg etc
            $file->move("images/slides-top/",$miImg);

            if($miImg != $file->getClientOriginalName()){
            	$images->image = $miImg;
            }
		}else
		{
			$file->move("images/slides-top/",$file->getClientOriginalName());

            $images->image = $file->getClientOriginalName();
		}

		$images->tipo = $tipo;
		if($images->save())
		{
			Session::flash('success','Imagen guardada correctamente');
			return Redirect::to('administrador/editar-slides');
		}else
		{
			Session::flash('danger','Error al guardar la imagen');
			return Redirect::to('administrador/nuevo-slide');
		}

	}
	
	public function postDeleteSlide()
	{
		$file 		= Input::get('name');
		$id     	= Input::get('id');
		$img = Slides::find($id);
		$img->deleted = 1;
		File::delete('images/slides-top/'.$img->image);
		$img->save();
		return Response::json(array('llego' => 'llego'));
	}

	public function getEditSlides()
	{
		$title = 'Editar slides';
		$slides = Slides::where('deleted','=',0)->get();
		return View::make('admin.editSlides')->with('title',$title)->with('slides',$slides);
	}
	public function postActiveSlide()
	{
		if (Request::ajax()) {
			$id = Input::get('id');
			$slide = Slides::find($id);
			if ($slide->activo == 0) {
				$slide->activo = 1;
				if($slide->save())
				{
					return Response::json(array('type' => 'success','msg' => 'Slide activado satisfactoriamente'));
				}else
				{
					return Response::json(array('type' =>'danger','msg' =>'Error al activar el slide'));
				}
			}else
			{
				return Response::json(array('type' => 'success','msg' => 'El Slide ya fue activado.'));
			}
		}
	}
	public function postDisableSlide()
	{
		if (Request::ajax()) {
			$id = Input::get('id');
			$slide = Slides::find($id);
			if ($slide->activo == 1) {
				$slide->activo = 0;
				if($slide->save())
				{
					return Response::json(array('type' => 'success','msg' => 'Slide desactivado satisfactoriamente'));
				}else
				{
					return Response::json(array('type' =>'danger','msg' =>'Error al desactivar el slide'));
				}
			}else
			{
				return Response::json(array('type' => 'success','msg' => 'El Slide ya fue desactivado.'));
			}
		}
	}
	public function postElimSlides()
	{
		if (Request::ajax()) {
			$id = Input::get('id');
			$slides = Slides::find($id);
			File::delete('images/slides-top/'.$slides->image);
			$slides->deleted = 1;
			if($slides->save())
			{
				return Response::json(array('type' => 'success','msg' => 'Slide eliminado satisfactoriamente'));
			}else
			{
				return Response::json(array('type' =>'danger','msg' =>'Error al eliminar el slide'));
			}

		}
	}
	public function post_upload()
	{
		$input = Input::all();
		$rules = array(
		    'file' => 'image|max:3000',
		);
		$messages = array(
			'image' => 'Todos los archivos deben ser imagenes',
			'max'	=> 'Las imagenes deben ser de menos de 3Mb'
		);
		$validation = Validator::make($input, $rules, $messages);

		if ($validation->fails())
		{
			return Response::make($validation)->withErrors($validation);
		}
		$images  = new Slides;
		$file = Input::file('file');
		$tipo = Input::get('tipo');
		if (file_exists('images/slides-top/'.$file->getClientOriginalName())) {
			//guardamos la imagen en public/imgs con el nombre original
            $i = 0;//indice para el while
            //separamos el nombre de la img y la extensión
            $info = explode(".",$file->getClientOriginalName());
            //asignamos de nuevo el nombre de la imagen completo
            $miImg = $file->getClientOriginalName();
            //mientras el archivo exista iteramos y aumentamos i
            while(file_exists('images/slides-top/'.$miImg)){
                $i++;
                $miImg = $info[0]."(".$i.")".".".$info[1];              
            }
            //guardamos la imagen con otro nombre ej foto(1).jpg || foto(2).jpg etc
            $file->move("images/slides-top/",$miImg);

            if($miImg != $file->getClientOriginalName()){
            	$images->image = $miImg;
            }
		}else
		{
			$file->move("images/slides-top/",$file->getClientOriginalName());

            $images->image = $file->getClientOriginalName();
		}
		$images->tipo = $tipo;
		$images->save();
        return Response::json(array('image' => $images->id));
	}
	public function getServices()
	{
		$title = "Editar Servicios";
		$services = Servicios::where('deleted','=',0)->get();
		return View::make('admin.editServices')
		->with('title',$title)
		->with('services',$services);
	}
	public function getServiceSelf($id)
	{
		$service = Servicios::find($id);
		$title   = "Modificación del servicio ".$service->nombre;
		return View::make('admin.editServiceSelf')
		->with('title',$title)
		->with('service',$service);
	}
	public function postService()
	{
		$data  = Input::all();
		$rules = array(
			'nombre' 	 => 'required',
			'nombre_eng' => 'required',
			'desc'		 => 'required',
			'desc_eng'   => 'required',
			'icono'   	 => 'required'
		);
		$msg = array(
			'required' => 'El campo es obligatorio'
		);
		$validator = Validator::make($data, $rules, $msg);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator);
		}
		$alt = str_replace(' ', '_',strtolower($data['nombre']));
		if (strpos($alt,'ñ')) {
			$alt = str_replace('ñ', 'n',$alt);
		}elseif(strpos($alt,'Ñ'))
		{
			$alt = str_replace('Ñ', 'n',$alt);
		}
		$serv = Servicios::find($data['id']);
		$serv->nombre 		  		= $data['nombre'];
		$serv->nombre_eng 	  		= $data['nombre_eng'];
		$serv->servicios_desc 		= $data['desc'];
		$serv->servicios_desc_eng   = $data['desc_eng'];
		$serv->icono   				= $data['icono'];
		$serv->alt 					= $alt;
		if (Input::hasFile('img_1')) {
			$file = Input::file('img_1');
			$this->upload_img($serv,$file,1);
		}
		if (Input::hasFile('img_2')) {
			$file = Input::file('img_2');
			$this->upload_img($serv,$file,2);
		}
		if (Input::hasFile('doc')) {
			$file = Input::file('doc');
			$this->upload_catalogo($serv,$file);
		}
		if ($serv->save()) {
			return Redirect::to('administrador/editar-servicios');
		}else
		{
			return Redirect::back();
		}
	}
	public function getSubServices()
	{
		$title = "Editar Servicios";
		$serv     = Servicios::all();
		$services = ContServ::where('deleted','=',0)->get();
		return View::make('admin.EditSubService')
		->with('title',$title)
		->with('serv',$serv)
		->with('services',$services);
	}
	public function getSubServicesSelf($id)
	{
		$contServ = ContServ::find($id);
		$serv     = Servicios::all();
		$title    = "Modificación del Sub-servicio ".$contServ->nombre;
		return View::make('admin.editSubServiceSelf')
		->with('title',$title)
		->with('serv',$serv)
		->with('contServ',$contServ);
	}
	public function postsubServices()
	{
		$data  = Input::all();
		$rules = array(
			'nombre' 	 => 'required',
			'nombre_eng' => 'required',
			'desc'		 => 'required',
			'desc_eng'   => 'required',
			'serv_id'    => 'required'
		);
		$msg = array(
			'required' => 'El campo es obligatorio'
		);
		$validator = Validator::make($data, $rules, $msg);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator);
		}
		$alt = str_replace(' ', '_',strtolower($data['nombre']));
		if (strpos($alt,'ñ')) {
			$alt = str_replace('ñ', 'n',$alt);
		}elseif(strpos($alt,'Ñ'))
		{
			$alt = str_replace('Ñ', 'n',$alt);
		}
		$serv = ContServ::find($data['id']);
		$serv->nombre 		  		= $data['nombre'];
		$serv->nombre_eng 	  		= $data['nombre_eng'];
		$serv->desc 				= $data['desc'];
		$serv->desc_eng   			= $data['desc_eng'];
		$serv->id_serv 				= $data['serv_id'];
		$serv->title 				= $alt;
		if (Input::hasFile('img_1')) {
			$file = Input::file('img_1');
			$this->upload_img($serv,$file,1);
		}
		if (Input::hasFile('img_2')) {
			$file = Input::file('img_2');
			$this->upload_img($serv,$file,2);
		}
		if (Input::hasFile('doc')) {
			$file = Input::file('doc');
			$this->upload_catalogo($serv,$file);
		}
		if ($serv->save()) {
			return Redirect::to('administrador/editar-sub-servicios');
		}else
		{
			return Redirect::back();
		}
	}
	public function logout()
	{
		Auth::logout();
		return Redirect::to('administrador');
	}
}