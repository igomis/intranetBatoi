<div class="container" style="clear: both">
    <br/>
    <div style="width:50%;float:left">SIGNAT: {{$datosInforme->Responsable->nombre}}  {{$datosInforme->Responsable->apellido1}}  {{$datosInforme->Responsable->apellido2}}</div>
    <div style="width:50%;float:right;text-align: right">{{strtoupper(config('contacto.poblacion'))}} A {{$datosInforme->hoy}}</div>
</div>