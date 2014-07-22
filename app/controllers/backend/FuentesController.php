<?php


class FuentesController extends BaseController {

    protected $layout='backend/template';

    function __construct(){
        if(!Auth::user()->super)
            App::abort(403, 'Unauthorized action.');
    }

    public function getIndex(){
        $limit = Input::get('limit', 10);
        $offset = Input::get('offset', 0);

        $fuentes = Fuente::with('hijos', 'hijos.hijos')->whereNull('fuente_padre_id')->offset($offset)->limit($limit)->get();

        $this->layout->title = 'Fuentes';
        $this->layout->sidebar=View::make('backend/fuentes/sidebar',array('item_menu'=>'fuentes'));
        $this->layout->content = View::make('backend/fuentes/index', array('fuentes' => $fuentes));
    }

    public function getVer($fuente_id){
        $this->layout->title = 'Fuentes';
        $this->layout->sidebar=View::make('backend/fuentes/sidebar',array('item_menu'=>'fuentes'));
        $this->layout->content = View::make('backend/fuentes/view', array('fuente' => Fuente::find($fuente_id)));
    }

    public function getNueva(){
        $data['fuentes'] = Fuente::with('hijos')->whereNull('fuente_padre_id')->get();
        $data['fuente'] = new Fuente();

        $this->layout->title = 'Fuentes';
        $this->layout->sidebar=View::make('backend/fuentes/sidebar',array('item_menu'=>'fuentes'));
        $this->layout->content = View::make('backend/fuentes/form', $data);
    }

    public function getEditar($fuente_id){
        $data['fuentes'] = Fuente::with('hijos')->whereNull('fuente_padre_id')->get();
        $data['fuente'] = Fuente::find($fuente_id);

        $this->layout->title = 'Fuentes';
        $this->layout->sidebar=View::make('backend/fuentes/sidebar',array('item_menu'=>'fuentes'));
        $this->layout->content = View::make('backend/fuentes/form', $data);
    }

    public function postGuardar($fuente_id = null){
        $validator = Validator::make(Input::all(), array(
            'nombre' => 'required'
        ));

        $json = new stdClass();
        if($validator->passes()){
            $fuente = $fuente_id ? Fuente::find($fuente_id) : new Fuente();

            $fuente->nombre = Input::get('nombre', '');

            if(Input::get('fuente_padre_id')){
                $fuente_padre = Fuente::find(Input::get('fuente_padre_id'));
                $fuente->padre()->associate($fuente_padre);
                $tipo = $fuente_padre->tipo == 'area' ? 'subarea' : 'subsubarea';
            } else {
                $tipo = 'area';
            }

            $fuente->tipo = $tipo;
            $fuente->save();

            $json->errors = array();
            $json->redirect = URL::to('backend/fuentes');

            Session::flash('messages', array('success' => 'La fuente '. $fuente->nombre .' ha sido creada.'));

            $response = Response::json($json, 200);
        } else {
            $json->errors = $validator->messages()->all();
            $response = Response::json($json, 400);
        }

        return $response;
    }

    public function getEliminar($fuente_id){
        $fuente = Fuente::find($fuente_id);
        $this->layout = View::make('backend/ajax_template');
        $this->layout->title = 'Eliminar Fuente';
        $this->layout->content = View::make('backend/fuentes/delete', array('fuente' => $fuente));
    }

    public function deleteEliminar($fuente_id){
        $fuente = Fuente::find($fuente_id);
        $fuente->delete();

        return Redirect::to('backend/fuentes')->with('messages', array('success' => 'La fuente' . $fuente->nombre . ' ha sido eliminada.'));
    }
} 