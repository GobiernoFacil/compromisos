<?php

class AuthController extends BaseController {


	public function getLogin()
	{
        return View::make('backend/auth/login');
	}

    public function getLogout(){
        Auth::logout();
        return Redirect::to('backend');
    }

    public function postLogin(){
        $validator = \Validator::make(\Input::all(), array(
                'email' => 'required|email',
                'password' => 'required'
            )
        );

        $json=new stdClass();
        if ($validator->passes()) {
            $email=Input::get('email');
            $password=Input::get('password');

            if (Auth::attempt(array('email' => $email, 'password' => $password))){
                $json->redirect=URL::to('backend');
                $response=\Response::json($json,200);
            }else{
                $json->errors[]='Correo y/o contraseña incorrecto.';

                $response=\Response::json($json,400);
            }


        } else {
            $json->errors=$validator->messages()->all();

            $response=\Response::json($json,400);


        }

        return $response;
    }

}
