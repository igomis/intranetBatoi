<?php

namespace Intranet\Http\Controllers\API;

use Illuminate\Http\Request;
use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;
use Intranet\Http\Controllers\API\ApiBaseController;
use Intranet\Entities\Colaboracion;
use Intranet\Entities\Profesor;

class ColaboracionController extends ApiBaseController
{

    protected $model = 'Colaboracion';

    public function instructores($id){
        $colaboracion = Colaboracion::find($id);
        $data = $colaboracion->Centro->instructores;
        return $this->sendResponse($data, 'OK');
    }

    public function resolve($id){
        $colaboracion = Colaboracion::find($id);
        $colaboracion::resolve($id);
        return $this->sendResponse($colaboracion,'OK');
    }

    public function refuse($id){
        $colaboracion = Colaboracion::find($id);
        $colaboracion::refuse($id);
        return $this->sendResponse($colaboracion,'OK');
    }
    public function unauthorize($id){
        $colaboracion = Colaboracion::find($id);
        $colaboracion::unauthorize($id);
        return $this->sendResponse($colaboracion,'OK');
    }
    public function switch($id){
        $colaboracion = Colaboracion::find($id);
        $profesor = Profesor::where('api_token',$_GET['api_token'])->first();
        $colaboracion->tutor = $profesor->dni;
        $colaboracion->save();
        return $this->sendResponse($profesor,'OK');
    }



}
