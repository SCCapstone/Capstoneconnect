<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//List all Users
	}

	/**
	 * Show the form for creating a new user
	 * belonging to a project of pid.
	 *
	 * @return Response
	 */
	public function projectCreate($pid)
	{
		return View::make('user_new', array('pid' => $pid));	
	}


	/**
	 * Show the form for creating a new user.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user_new');	
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try
		{
			$group=$_POST["group"];
			switch ($group)
			{
				case "U":
				  $permissions = array(
				  	'user.create' => -1,
	                'user.delete' => -1,
	                'user.view'   => 1,
	                'user.update' => 1,
	                );
				  break;
				case "A":
				  $permissions = array(
	                'user.create' => 1,
	                'user.delete' => 1,
	                'user.view'   => 1,
	                'user.update' => 1,
	                );
				  break;
				default:
					echo "Group wan't specified.";
				exit;
			}

   			$user = Sentry::createUser(array(
				'email' => $_POST["email"],
				'first_name' => $_POST["first_name"],
				'last_name' => $_POST["last_name"],
				'activated' => false,
				'project_id' => $_POST["pid"],
				'password' => sha1(time()),
				'permissions'=> $permissions,
			));
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
    		echo 'User with this email already exists.';
		}

		return Redirect::to('admin_users');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//Ask if this is correct
		//Then confirm
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		return View::make('user_edit', $user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);

		// $group=$_POST["group"];
		// switch ($group)
		// {
		// 	case "U":
		// 	  $user->permissions = array(
		// 	  	'user.create' => -1,
  //               'user.delete' => -1,
  //               'user.view'   => 1,
  //               'user.update' => 1,
  //               );
		// 	  break;
		// 	case "A":
		// 	  $user->permissions = array(
  //               'user.create' => 1,
  //               'user.delete' => 1,
  //               'user.view'   => 1,
  //               'user.update' => 1,
  //               );
		// 	  break;
		// 	default:
		// 		echo "Group wan't specified.";
		// 	exit;
		// }

		$user->email = $_POST["email"];
		$user->first_name = $_POST["first_name"];
		$user->last_name = $_POST["last_name"];
		$user->save();

		return Redirect::to('admin_users');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);
		return Redirect::back();
	}

}