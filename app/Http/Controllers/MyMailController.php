<?php

/* clase : IntranetController
 * És la classe pare de tots els controladors amb el mètodes comuns a ells
 */

namespace Intranet\Http\Controllers;

use Intranet\Botones\Mail as myMail;
use Illuminate\Http\Request;
use Intranet\Entities\Instructor;

/**
 * Class AdministracionController
 * @package Intranet\Http\Controllers
 */
class MyMailController extends Controller
{
    
    public function send(Request $request)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()){
            
            $ext = $request->file('file')->getClientOriginalExtension();
            $mime = $request->file('file')->getMimeType();
            $nom = "AdjuntCorreu.".$ext;
            $request->file('file')->move(storage_path('tmp/'), $nom);
            $fitxer = 'tmp/'.$nom;
            
        }  
       
        $mail = new myMail($request->to,$request->toPeople,$request->subject,$request->content,$request->from,$request->fromPerson,$request->class,$request->register,[$fitxer => $mime]);
        $mail->send();
        return redirect($request->route);
    }


    public function store(Request $request)
    {
        
        
        $colectiu = 'Intranet\\Entities\\'.$request->collect;
        $mail = new myMail($colectiu::all(),null,'CIPFP Batoi',null,null,null,null,false);
        return $mail->render('\\');
    }
    
    public function create()
    {
        return view('email.chooseCollect');
    }


}
