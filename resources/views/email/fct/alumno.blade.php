@extends('layouts.email')
@section('body')
<table style='text-align: center'>
    <tr>
        <th>Fi de les pràctiques de FCT</th>
    </tr>
</table>
<div>
    <table style=" border:#000 solid 1;">

        <tr><td><strong>De: </strong>{!! $remitente['nombre']  !!}  </td></tr>
        <tr><td>{{ config('constants.contacto.nombre')}}</td></tr>

    </table>
</div>
<div class="container" >
    <p>{{$elemento->Alumno->FullName}}. Les pràctiques de FCT han arribat a la seua fi i per tal de millorar-les ens és de molt utilitat la teua opinió.</p>
    <p>Hem preparat aquest <a href="https://docs.google.com/forms/d/1VSUdehL0EVuEmruHQmFVYMenRxMOoljHBjJ5kGOiSug/viewform?edit_requested=true">formulari</a> per recollir-la.</p>
    <p>Gràcies per la teua col.laboració</p>
</div>
@endsection