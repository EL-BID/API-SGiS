<?php

namespace App\Http\Controllers\V1\Catalogos;


use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use \Validator,\Hash, \Response;

use App\Http\Controllers\ApiController;
use App\Models\Catalogos\Apoyos;


/**
 * Controlador Apoyo
 *
 * @package    UGUS API
 * @subpackage Controlador
 * @author     Luis Alberto Valdez Lescieur <luisvl13@gmail.com>
 * @created    2017-03-22
 *
 * Controlador `Apoyo`: Controlador  para el manejo de catalogo apoyos
 *
 */
class ApoyoController extends ApiController
{
    /**
     * Muestra una lista de los recursos según los parametros a procesar en la petición.
     *
     * <h3>Lista de parametros Request:</h3>
     * <Ul>Paginación
     * <Li> <code>$pagina</code> numero del puntero(offset) para la sentencia limit </ li>
     * <Li> <code>$limite</code> numero de filas a mostrar por página</ li>
     * </Ul>
     * <Ul>Busqueda
     * <Li> <code>$valor</code> string con el valor para hacer la busqueda</ li>
     * <Li> <code>$order</code> campo de la base de data por la que se debe ordenar la información. Por Defaul es ASC</ li>
     * </Ul>
     *
     * Conceptos ordenamiento con respecto a id:
     * <code>
     * http://url?pagina=1&limite=5&order=id ASC
     * </code>
     * <code>
     * http://url?pagina=1&limite=5&order=-id DESC
     * </code>
     *
     * Todo Los parametros son opcionales, pero si existe pagina debe de existir tambien limite
     * @return Response
     * <code style="color:green"> Respuesta Ok json(array("status": 200, "messages": "Operación realizada con exito", "data": array(resultado)),status) </code>
     * <code> Respuesta Error json(array("status": 404, "messages": "No hay resultados"),status) </code>
     */
    public function index()
    {
        $parametros = Input::only('q','page','per_page');
        if ($parametros['q']) {
            $data =  Apoyos::where(function($query) use ($parametros) {
                $query->where('id','LIKE',"%".$parametros['q']."%")
                    ->orWhere('nombre','LIKE',"%".$parametros['q']."%")
                    ->orWhere('descripcion','LIKE',"%".$parametros['q']."%");
            });
        } else {
            $data =  Apoyos::where("id","!=", "");
        }

        if(isset($parametros['page'])){

            $resultadosPorPagina = isset($parametros["per_page"]) ? $parametros["per_page"] : 20;
            $data = $data->paginate($resultadosPorPagina);
        } else {
            $data = $data->get();
        }

        return $this->respuestaVerTodo($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensajes = [

            'required'      => "required",
            'unique'        => "unique"
        ];

        $reglas = [
            'nombre'        => 'required|unique:apoyos',
        ];

        $inputs = Input::only('nombre', 'descripcion');

        $v = Validator::make($inputs, $reglas, $mensajes);

        if ($v->fails()) {
            return $this->respuestaError($v->errors(), 409);
        }

        try {

            $data = Apoyos::create($inputs);
            return $this->respuestaVerUno($data,201);

        } catch (\Exception $e) {
            return $this->respuestaError($e->getMessage(), 409);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Apoyos::find($id);

        if(!$data){
            return $this->respuestaError('No se encuentra el recurso que esta buscando.', 404);
        }

        return $this->respuestaVerUno($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mensajes = [

            'required'      => "required",
            'unique'        => "unique"
        ];

        $reglas = [
            'nombre'        => 'required',
        ];

        $inputs = Input::only('nombre','descripcion');

        $v = Validator::make($inputs, $reglas, $mensajes);

        if ($v->fails()) {
            return $this->respuestaError($v->errors(), 409);
        }

        try {
            $data = Apoyos::find($id);
            $data->nombre =  $inputs['nombre'];
            $data->descripcion =  $inputs['descripcion'];

            $data->save();
            return $this->respuestaVerUno($data);

        } catch (\Exception $e) {
            return $this->respuestaError($e->getMessage(), 409);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = Apoyos::destroy($id);
            return $this->respuestaVerTodo($data);
        } catch (Exception $e) {
            return $this->respuestaError($e->getMessage(), 409);
        }
    }
}