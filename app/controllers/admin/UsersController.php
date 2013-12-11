<?php

class Admin_UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$users = User::paginate(2);
		//dd($users)
        return View::make('admin/users/list')->with('users', $users);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$user = new User;
      	return View::make('admin/users/form')->with('user', $user);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $user = new User;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();

        // Revisamos si la data es válida y guardamos en ese caso
        if ($user->validAndSave($data))
        {
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.users.show', array($user->id));
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
            return Redirect::route('admin.users.create')->withInput()->withErrors($user->errors);
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$user=User::find($id);
		
		if (is_null ($user))
		{
			App::abort(404,'No se encontró el usuario');
		}

		return View::make('admin/users/show')->with('user',$user);
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$user = User::find($id);
		if (is_null ($user))
		{
			App::abort(404,'No se encontró el usuario');
		}

		return View::make('admin/users/form')->with('user', $user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $user = User::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($user))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válida y guardamos en ese caso
        if ($user->validAndSave($data))
        {
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.users.show', array($user->id));
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
            return Redirect::route('admin.users.edit', $user->id)->withInput()->withErrors($user->errors);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$user = User::find($id);
        
        if (is_null ($user))
        {
            App::abort(404);
        }
        
        $user->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Usuario ' . $user->full_name . ' eliminado',
                'id'      => $user->id
            ));
        }
        else
        {
            return Redirect::route('admin.users.index');
        }
        /*
		User::destroy($id);

    	return Redirect::route('admin.users.index');
        */
	}

}