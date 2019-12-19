<?php
/**
 * Created by PhpStorm.
 * User: igomis
 * Date: 2019-04-11
 * Time: 13:47
 */

namespace Intranet\Botones;

use Mail as LaravelMail;
use Intranet\Mail\DocumentRequest;
use Styde\Html\Facades\Alert;
use Intranet\Entities\Activity;

class Mail
{

    private $elements;
    private $from;
    private $subject;
    private $view;
    private $fromPerson;
    private $toPeople;
    private $class;
    private $register;
    private $attach;
    private $action;

    /**
     * Mail constructor.
     * @param $to
     * @param $from
     * @param $subject
     * @param $content
     * @param $route
     */
    public function __construct($elements=null,$toPeople=null,$subject=null,$view=null,$from=null,$fromPerson=null,$class=null,$register=true,$attach=null,$action='email')
    {
        $this->from = $from?$from:AuthUser()->email;
        $this->subject = $subject;
        $this->fromPerson = $fromPerson?$fromPerson:AuthUser()->FullName;
        $this->view = $view;
        $this->toPeople = $toPeople;
        $this->register = $register;
        $this->attach =$attach;
        $this->action = $action;
        if (is_object($elements)){
            $this->elements = $elements;
            $this->class = get_class($this->elements->first());
        }
        else{
            $this->class = $class;
            $this->elements = $this->recoveryObjects($elements);
        }
    }

    private function recoveryObjects($elements){
        $objects = collect();
        foreach ( explode(',',$elements) as $element){
            $objects->push($this->recoveryObject($element));
        }
        return $objects;
    }
    private function recoveryObject($element){
        if ($element != '') {
            $toCompost = explode('(', $element);
            $id = $toCompost[0];
            if (isset($toCompost[1])) return $this->updateModel(explode(';',$toCompost[1]),$id);
        }
        return null;
    }
    private function updateModel($contact,$id){

        $email = $contact[0];
        $contacto = substr($contact[1],0,strlen($contact[1])-1);
        $class = $this->class;
        $modelo = $class::find($id);
        if (!isset($modelo->dni) && ($modelo->contacto != $contacto || $modelo->email != $email)){
            $modelo->saveContact($contacto,$email);
        }
        return $modelo;
    }

    public function render($route){
        $to  = $this->getReceivers($this->elements);
        
        
        $from = $this->from;
        $subject = $this->subject;
        $content = $this->view;
        $fromPerson = $this->fromPerson;
        $toPeople = $this->toPeople;
        $class = $this->class;
        $register = $this->register;
        
        return view('email.view',compact('to','from','subject','content','route','fromPerson','toPeople','class','register'));
    }

    public function send($fecha=null){
        if (is_iterable($this->elements))
            foreach ($this->elements as $elemento) {
                $this->sendMail($elemento,$fecha);
            }
        else $this->sendMail($this->elements,$fecha);
    }

    private function sendMail($elemento,$fecha){
        if (isset($elemento->contacto)  ) {
            if (filter_var($elemento->email,FILTER_VALIDATE_EMAIL)) {
                LaravelMail::to($elemento->email, $elemento->contacto)
                    ->bcc($this->from)
                    ->send(new DocumentRequest($this, $this->chooseView(), $elemento, $this->attach));
                Alert::info('Enviat correus ' . $this->subject . ' a ' . $elemento->contacto);
                if ($this->register)
                    Activity::record($this->action, $elemento, null, $fecha, $this->subject);
            }
            else Alert::danger("No s'ha pogut enviar correu a $elemento->contacto. Comprova email");
        }

    }

    private function chooseView(){
        if (strlen($this->view)> 50) return'email.standard';
        return $this->view;
    }

    private function getReceivers($elementos){
        $to = '';
        foreach ($elementos as $elemento){
            $to .= $this->getReceiver($elemento).',';
        }
        return $to;
    }

    private function getReceiver($elemento){
        return $elemento->id.'('.$elemento->email.';'.$elemento->contacto.')';
    }

    /**
     * @return null
     */
    public function getTo()
    {
        return $this->elements;
    }

    /**
     * @return |null
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return null
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return null
     */
    public function getContent()
    {
        return $this->view;
    }

    /**
     * @return |null
     */
    public function getFromPerson()
    {
        return $this->fromPerson;
    }

    /**
     * @return null
     */
    public function getToPeople()
    {
        return $this->toPeople;
    }


}