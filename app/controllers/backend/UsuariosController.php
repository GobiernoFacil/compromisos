<?php

class UsuariosController extends BaseController {

    protected $layout='backend/template';

    function __construct(){
        if(!Auth::user()->super)
            App::abort(403, 'Unauthorized action.');
    }

    public function getIndex(){
        $this->layout->title = 'Usuarios';
        $this->layout->sidebar=View::make('backend/usuarios/sidebar',array('item_menu'=>'usuarios'));
        $this->layout->content = View::make('backend/usuarios/index', array('usuarios' => Usuario::all()));
    }

    public function getVer($usuario_id){
        $this->layout->title = 'Usuarios';
        $this->layout->sidebar=View::make('backend/usuarios/sidebar',array('item_menu'=>'usuarios'));
        $this->layout->content = View::make('backend/usuarios/view', array('usuario' => Usuario::find($usuario_id)));
    }

    public function getNuevo(){
        $this->layout->title = 'Usuarios';
        $this->layout->sidebar=View::make('backend/usuarios/sidebar',array('item_menu'=>'usuarios'));
        $this->layout->content = View::make('backend/usuarios/form', array('usuario' => new Usuario()));
    }

    public function getEditar($usuario_id){
        $this->layout->title = 'Usuarios';
        $this->layout->sidebar=View::make('backend/usuarios/sidebar',array('item_menu'=>'usuarios'));
        $this->layout->content = View::make('backend/usuarios/form', array('usuario' => Usuario::find($usuario_id)));
    }

    public function postGuardar($usuario_id = null){

        $validator = Validator::make(Input::all(),array(
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'super' => 'required',
            'password' => ($usuario_id ? 'confirmed' : 'required|confirmed')
        ));

        $json = new stdClass();
        if($validator->passes()){
            $usuario = $usuario_id ? Usuario::find($usuario_id) : new Usuario();

            if(Input::get('password'))
                $usuario->password = Hash::make(Input::get('password'));

            $usuario->nombres = Input::get('nombres', '');
            $usuario->apellidos = Input::get('apellidos', '');
            $usuario->email = Input::get('email', '');
            $usuario->super = Input::get('super');

            $usuario->save();

            $json->errors = array();
            $json->redirect = URL::to('backend/usuarios');

            Session::flash('messages', array('success' => 'El usuario '. $usuario->nombre_completo .' ha sido creado.'));

            $response = Response::json($json, 200);
        } else {
            $json->errors = $validator->messages()->all();
            $response = Response::json($json, 400);
        }

        return $response;
    }

    public function getEliminar($usuario_id){
        $usuario = Usuario::find($usuario_id);
        $this->layout = View::make('backend/ajax_template');
        $this->layout->title = 'Eliminar Usuario';
        $this->layout->content = View::make('backend/usuarios/delete', array('usuario' => $usuario));
    }

    public function deleteEliminar($usuario_id){
        $usuario = Usuario::find($usuario_id);
        $usuario->delete();

        return Redirect::to('backend/usuarios')->with('messages', array('success' => 'El usuario ' . $usuario->nombre_completo . ' ha sido eliminado.'));
    }
}