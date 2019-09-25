<?php

namespace Intranet\Entities;

use Illuminate\Database\Eloquent\Model;
use Intranet\Entities\Centro;
use Intranet\Entities\Colaboracion;
use Intranet\Entities\Grupo;
use Jenssegers\Date\Date;
use Intranet\Events\ActivityReport;
use Intranet\Events\FctCreated;
use Intranet\Entities\Alumno;
use phpDocumentor\Reflection\Types\Array_;


class Fct extends Model
{
    use BatoiModels;
    
    protected $table = 'fcts';
    public $timestamps = false;

    protected $fillable = ['idAlumno',
        'idColaboracion','idInstructor' ,'desde', 'hasta',
        'horas','asociacion',
        ];
    protected $notFillable = ['hasta','idAlumno','horas'];

    protected $rules = [
        'idAlumno' => 'sometimes|required',
        'idColaboracion' => 'sometimes|required',
        'idInstructor' => 'sometimes|required',
        'desde' => 'sometimes|required|date',
        'hasta' => 'sometimes|required|date',
        //'horas' => 'numeric',
    ];
    protected $inputTypes = [
        'idAlumno' => ['type' => 'select'],
        'idColaboracion' => ['type' => 'select'],
        'idInstructor' => ['type' => 'select'],
        'asociacion' => ['type' => 'hidden'],
        'desde' => ['type' => 'date'],
        'hasta' => ['type' => 'date'],
        
    ];
    protected $dispatchesEvents = [
        'saved' => ActivityReport::class,
        'created' => FctCreated::class,
        'deleted' => ActivityReport::class,
    ];
    
    public function __construct()
    {
        $this->asociacion = 1;
    }
    
    public function Colaboracion()
    {
        return $this->belongsTo(Colaboracion::class, 'idColaboracion', 'id');
    }
    public function Instructor()
    {
        return $this->belongsTo(Instructor::class, 'idInstructor', 'dni');
    }
    public function Colaboradores()
    {
        return $this->belongsToMany(Instructor::class,'colaboradores', 'idFct', 'idInstructor','id','dni')->withPivot('horas');
    }
    public function Alumnos()
    {
        return $this->belongsToMany(Alumno::class,'alumno_fcts', 'idFct', 'idAlumno','id','nia')->withPivot(['calificacion','calProyecto','actas','insercion','horas','desde','hasta','correoAlumno','pg0301']);
    }
    public function AlFct()
    {
        return $this->belongsTo(AlumnoFct::class,'id','idFct');
    }
    
    public function scopeCentro($query, $centro)
    {
        $colaboracion = Colaboracion::select('id')->where('idCentro',$centro)->get()->toarray();
        return $query->whereIn('idColaboracion', $colaboracion);
    }
    
    public function scopeEmpresa($query, $empresa)
    {
        $centros = Centro::select('id')->Empresa($empresa)->get()->toarray();
        $colaboracion = Colaboracion::select('id')->whereIn('idCentro',$centros)->get()->toarray();
        return $query->whereIn('idColaboracion', $colaboracion);
    }
    
    public function scopeMisFcts($query,$profesor=null,$dual=false)
    {
        $profesor = $profesor?$profesor:AuthUser()->dni;
        $cicloC =  Grupo::select('idCiclo')->QTutor($profesor,$dual)->first()?Grupo::select('idCiclo')->QTutor($profesor,$dual)->first()->idCiclo:null;
        $colaboraciones = Colaboracion::select('id')->where('idCiclo',$cicloC)->get()->toArray();
        $alumnos = Alumno::select('nia')->misAlumnos($profesor,$dual)->get()->toArray();
        $alumnos_fct = AlumnoFct::select('idFct')->distinct()->whereIn('idAlumno',$alumnos)->get()->toArray();
        return $query->whereIn('id',$alumnos_fct)->whereIn('idColaboracion',$colaboraciones);
    }


    public function scopeMisFctsColaboracion($query)
    {
        $colaboraciones = hazArray(Colaboracion::where('tutor',AuthUser()->dni)->get(),'id','id');
        return $query->whereIn('idColaboracion',$colaboraciones);
    }

    public function scopeEsExempt($query)
    {
        return $query->where('asociacion','=',2);
    }
    
    public function scopeEsFct($query)
    {
        return $query->where('asociacion','<',2);
    }
    public function scopeEsAval($query)
    {
        return $query->where('asociacion','<',3);
    }
    public function scopeEsDual($query)
    {
        return $query->where('asociacion',3);
    }

   
    public function getIdColaboracionOptions(){
        $cicloC = Grupo::select('idCiclo')->QTutor(AuthUser()->dni)->get();
        $ciclo = $cicloC->count()>0?$cicloC->first()->idCiclo:'';
        $colaboraciones = Colaboracion::where('idCiclo',$ciclo)->get();
        $todos = [];
        
        foreach ($colaboraciones as $colaboracion){
            if ($colaboracion->Centro->Empresa->concierto){
                $todos[$colaboracion->id] = $colaboracion->Centro->nombre;
                if ($colaboracion->Centro->direccion) $todos[$colaboracion->id].=' ('.$colaboracion->Centro->direccion.')';
            }    
        }
        return array_sort($todos, function ($value) {
            return $value;
        });
    }

    public function getIdAlumnoOptions(){
        return hazArray(Alumno::misAlumnos()->orderBy('apellido1')->orderBy('apellido2')->get(),'nia',['NameFull','horasFct'],' - ');
    }

    public function getIdInstructorOptions(){
        if ($this->idColaboracion){
            $colaboracion = Colaboracion::find($this->idColaboracion);
           return hazArray($colaboracion->Centro->instructores,'dni',['nombre']);
        }
        else return [];
    }

    public function getTipusAttribute(){
        return config('auxiliares.asociacionEmpresa')[$this->asociacion];
    }
    public function getDesdeAttribute($entrada)
    {
        $fecha = new Date($entrada);
        return $fecha->format('d-m-Y');
    }
    public function getHastaAttribute($entrada)
    {
        $fecha = new Date($entrada);
        return $fecha->format('d-m-Y');
    }
    public function getDualAttribute()
    {
        return $this->asociacion == 3;
    }
    public function getExentoAttribute()
    {
        return $this->asociacion == 2;
    }
    
    public function getCentroAttribute(){
        return isset($this->Colaboracion->Centro->nombre)?$this->Colaboracion->Centro->nombre:'Convalidada/Exent';
    }
    public function getPeriodeAttribute(){
        $inici = new Date($this->desde);
        $inici->format('Y-m-d');
        if ($inici <= config('curso.fct.2')['inici']) return 1;
        else return 2;    
    }
    public function getCicloAttribute(){
        return $this->Colaboracion->Ciclo->ciclo;
    }
    public function getQuantsAttribute(){
       $quants = 0;
        foreach ($this->Alumnos as $alumno){
            if (in_array(AuthUser(),$alumno->tutor)) $quants ++;
        } 
        return $quants;
    }
    public function getNalumnesAttribute(){
        if ($this->quants != $this->Alumnos->Count())
            return $this->quants.' ('.$this->Alumnos->Count().')';
        else
            return $this->quants;
    }
    public function getLalumnesAttribute(){
        $alumnes = '';
        foreach ($this->Alumnos as $alumno){
            if (in_array(AuthUser(),$alumno->tutor)) 
                $alumnes .= $alumno->ShortName.', ';
        } 
        return substr($alumnes,0, strlen($alumnes)-2);
    }
    public function getEmailAttribute(){
        return isset($this->idInstructor)?$this->Instructor->email:'Falta Instructor';
    }
    public function getContactoAttribute(){
        return isset($this->idInstructor)?$this->Instructor->nombre:'Falta Instructor';
    }

    public function getXinstructorAttribute(){
        if (isset($this->Instructor->nombre)) return $this->Instructor->nombre;
        return '';
    }
    public function saveContact($contacto,$email)
    {
        $instructor = $this->Instructor;
        $instructor->email = $email;
        $instructor->name = '';
        $instructor->surnames = $contacto;
        $instructor->save();
    }


}
