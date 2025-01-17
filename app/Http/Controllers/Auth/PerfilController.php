<?php

namespace Intranet\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;
use Intranet\Http\Controllers\IntranetController;


abstract class PerfilController extends IntranetController
{
    
    protected $vista = ['show' => 'perfil', 'edit' => 'perfil'];

    public function update(Request $request, $new)
    {
        $this->validate($request, $new->getRules());
        if ($request->email) {
            $new->email = $request->email;
        }
        if ($request->emailItaca) {
            $new->emailItaca = $request->emailItaca;
        }
        if ($request->idioma) {
            $new->idioma = $request->idioma;
        }
        if ($request->departamento) {
            $new->departamento = $request->departamento;
        }
        if ($request->especialitat) {
            $new->especialitat = $request->especialitat;
        }


        if ($request->hasFile('foto')) {

            if ($request->file('foto')->isValid()) {
                $new->foto = $request->file('foto')->store('fotos','public');
            } else {
                Alert::info('Formato no valido');
            }
        } else {
            if ($new->foto == null)
                Alert::info('No hay foto');
        }
        if ($request->hasFile('signatura')){
            if ($request->file('signatura')->isValid()) {
                $request->file('signatura')->storeAs('signatures',AuthUser()->dni.'.'.$request->file('signatura')->getClientOriginalExtension(),'public');
                Alert::info('Signatura guardada amb exit');
            } else {
                Alert::info('Formato no valido');
            }
        }
        if ($request->rol) {
            $new->rol = Rol($request->rol);
        }
        
        $new->save();
    }

}
