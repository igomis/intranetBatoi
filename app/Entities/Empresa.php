<?php

namespace Intranet\Entities;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Intranet\Events\ActivityReport;


class Empresa extends Model
{

    use BatoiModels;

    protected $table = 'empresas';
    protected $fillable = [ 'europa','sao','concierto','cif', 'nombre', 'email', 'direccion', 'localidad', 'telefono',
        'dual', 'actividad', 'delitos', 'menores','copia_anexe1','observaciones','creador'];
    protected $rules = [
        'cif' => 'required|alpha_num',
        'nombre' => 'required|between:0,100',
        'email' => 'email',
        'concierto' => 'sometimes|required|unique:empresas,concierto',
        'direccion' => 'required|between:0,100',
        'localidad' => 'required|between:0,30',
        'telefono' => 'required|max:20'
    ];
    protected $inputTypes = [
        'europa' => ['type' => 'checkbox'],
        'dual' => ['type' => 'checkbox'],
        'delitos' => ['type' => 'checkbox'],
        'menores' => ['type' => 'checkbox'],
        'email' => ['type' => 'email'],
        'telefono' => ['type'=>'number'],
        'sao' => ['type' => 'checkbox'],
        'copia_anexe1' => ['type'=>'checkbox'],
        'observaciones' => ['type' => 'textarea'],
        'creador' => ['type' => 'hidden'],
    ];
    protected $hidden = ['created_at', 'updated_at','creador'];
    protected $dispatchesEvents = [
        'saved' => ActivityReport::class,
        'deleted' => ActivityReport::class,
    ];
    protected $fileField = 'concierto';

    public function __construct()
    {
        $this->europa = 0;
        $this->sao = 1;
        $this->copia_anexe1 = 1;
    }
    public function centros()
    {
        return $this->hasMany(Centro::class, 'idEmpresa', 'id');
    }
    
    public function scopeCiclo($query,$tutor)
    {
        $ciclo = Grupo::QTutor($tutor)->first()->idCiclo;
        $centros = Colaboracion::select('idCentro')->Ciclo($ciclo)->get()->toArray();
        $empreses = Centro::select('idEmpresa')->distinct()->whereIn('id',$centros)->get()->toArray();
        return $query->whereIn('id',$empreses);
    }
 public function scopeMenor($query, $fecha = null)
    {
        $hoy = $fecha ? new Date($fecha) : new Date();
        $hace18 = $hoy->subYears(18)->toDateString();
        return $query->where('fecha_nac', '>', $hace18);
    }
    
}
