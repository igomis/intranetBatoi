<?php

/* clase : IntranetController
 * És la classe pare de tots els controladors amb el mètodes comuns a ells
 */

namespace Intranet\Http\Controllers;

use Intranet\Http\Controllers\Controller;
use Intranet\Botones\Panel;
use Illuminate\Support\Facades\Session;
use Intranet\Entities\Programacion;
use Intranet\Entities\Modulo_ciclo;
use Intranet\Entities\Modulo_grupo;
use Intranet\Entities\Ciclo;
use Intranet\Entities\Resultado;
use DB;
use Intranet\Entities\Horario;
use Intranet\Entities\Grupo;
use Styde\Html\Facades\Alert;
use Intranet\Entities\Profesor;
use Illuminate\Support\Facades\Storage;
use Intranet\Entities\Menu;
use Intranet\Jobs\SendEmail;
use Intranet\Entities\Fct;
use Intranet\Entities\AlumnoFct;
use Intranet\Entities\FctColaborador;
use Intranet\Entities\Expediente;

class AdministracionController extends Controller
{

    public function simplifica()
    {
        if (Session::get('completa'))
            Session::forget('completa');
        else
            Session::put('completa', 1);
        return back();
    }

    public function lang($lang)
    {
        Session::put('lang', $lang);
        return back();
    }

    protected function deleteProgramacionIndex()
    {
        $cuantas = Programacion::where('estado', 3)->where('curso', '!=', Curso())->count();
        return view('programacion.deleteOld', compact('cuantas'));
    }

    protected function deleteProgramacion()
    {
        Programacion::where('estado', 4)->delete();
        Programacion::where('curso', '!=', Curso())->update(['estado' => 4]);
        return back();
    }

    public function allApiToken()
    {
        $remitente = ['nombre' => 'Intranet', 'email' => config('contacto.host.email')];
        foreach (Profesor::Activo()->get() as $profesor) {
            dispatch(new SendEmail($profesor->email, $remitente, 'email.apitoken', $profesor));
        }
        Alert::info('Correus enviats');
        return back();
    }

    protected function nuevoCursoIndex()
    {
        return view('nuevo.curso');
    }

    protected function nuevoCurso()
    {
        //$this->checkForeignKeys(false);
        $tables = ['actividades', 'comisiones', 'cursos', 'expedientes', 'faltas', 'faltas_itaca', 'faltas_profesores',
            'fcts', 'grupos_trabajo', 'guardias', 'horarios', 'incidencias', 'notifications', 'ordenes_trabajo', 'reservas',
            'resultados', 'reuniones', 'tutorias_grupos', 'modulo_grupos', 'activities'];
        foreach ($tables as $tabla) {
            DB::table($tabla)->delete();
        }

        //$this->checkForeignKeys(true);
        return back();
    }

    public function help($fichero, $enlace)
    {
        return view('intranet.readme', ['elemento' => mdFind($fichero, $enlace)]);
    }

    public static function exe_actualizacion($version_antigua)
    {
        foreach (config('constants.version') as $version) {
            if ($version > $version_antigua) {
                AdministracionController::$version();
            }
        }
    }

    public static function v1_0()
    {
        Alert::info('Version 1.0');
    }

    public static function v1_1()
    {
        Alert::info('Version 1.1');
    }

    public static function v1_2()
    {
        Alert::info('Version 1.2');
    }

    public static function v1_3_4()
    {
        Expediente::where('tipo',4)->update(['tipo'=>3]);
        Expediente::where('tipo',5)->update(['tipo' => 4]);
        $a = new \Intranet\Entities\TipoExpediente();
        $a->titulo = 'Baixa Inasistència';
        $a->rol = 17;
        $a->save();
        $a = new \Intranet\Entities\TipoExpediente();
        $a->titulo = 'Pèrdua Avaluació Continua';
        $a->rol = 3;
        $a->save();
        $a = new \Intranet\Entities\TipoExpediente();
        $a->titulo = "Remisió al departament d'Orientació";
        $a->rol = 17;
        $a->orientacion = 1;
        $a->save();
        $a = new \Intranet\Entities\TipoExpediente();
        $a->titulo = "Part d'amonestació";
        $a->rol = 3;
        $a->orientacion = 0;
        $a->save();
    }
    
}
