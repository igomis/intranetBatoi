<?php

namespace Intranet\Http\Controllers;

use Intranet\Botones\BotonImg;
use Intranet\Botones\BotonBasico;
use Intranet\Entities\Grupo;
use Intranet\Entities\Fct;
use DB;
use Styde\Html\Facades\Alert;

class PanelAvalFctController extends BaseController
{
    
    protected $perfil = 'profesor';
    protected $model = 'Fct';
    protected $gridFields = [ 'Nombre', 'qualificacio', 'projecte','periode'];
    protected $profile = false;
    
    public function search()
    {
        $nombres = Fct::select('idAlumno')->distinct()->misFcts()->get()->toArray();
        $todas = collect();
        foreach ($nombres as $nombre){
            $todas->push(Fct::misFcts()->where('idAlumno',$nombre['idAlumno'])->orderBy('idAlumno')->first());
        }
        return $todas;
    }
    
     protected function iniBotones()
    {
        $this->panel->setBoton('grid', new BotonImg('fct.apte', ['img' => 'fa-hand-o-up', 'where' => [ 'calificacion', '!=', '1', 'actas', '==', 0]]));
        $this->panel->setBoton('grid', new BotonImg('fct.noApte', ['img' => 'fa-hand-o-down', 'where' => ['calProyecto','<','5', 'calificacion', '!=', '0', 'actas', '==', 0]]));
        
        if (Grupo::QTutor()->first() && Grupo::QTutor()->first()->acta_pendiente == false){
            $this->panel->setBoton('index', new BotonBasico("fct.acta", ['class' => 'btn-info','roles' => config('constants.rol.tutor')]));
        }
        else
            Alert::message("L'acta pendent esta en procés", 'info');
        if (Grupo::QTutor()->first() && Grupo::QTutor()->first()->proyecto){
            $this->panel->setBoton('grid', new BotonImg('fct.proyecto', ['img' => 'fa-file', 'roles' => config('constants.rol.tutor'),
                'where' => [ 'calProyecto', '<', '1', 'actas', '<', 2]]));
            $this->panel->setBoton('grid', new BotonImg('fct.noProyecto', ['img' => 'fa-toggle-off', 'roles' => config('constants.rol.tutor'),
                'where' => [ 'calProyecto', '<', '0', 'actas', '<', 2]]));
            $this->panel->setBoton('grid', new BotonImg('fct.nuevoProyecto', ['img' => 'fa-toggle-on', 'roles' => config('constants.rol.tutor'),
                'where' => [ 'calProyecto', '<', '5', 'calProyecto','>=',0,'actas', '==', 2]]));
        }
        $this->panel->setBoton('grid', new BotonImg('fct.show'));
    }
    
    
}