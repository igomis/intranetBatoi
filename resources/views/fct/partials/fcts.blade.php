<ul class="messages fct">
@foreach(\Intranet\Entities\FCT::where('idAlumno',$fct->idAlumno)->get() as $fct)
        <li>
            <div class="message_date">
                <h4 class="text-info"><i class="fa fa-calendar-times-o user-profile-icon"></i> 
                    <a href='/fct/{{$fct->id}}/show'>{{$fct->Colaboracion->Centro->nombre}}</a>
                </h4>
                
            </div>
            <div class="message_wrapper">
                    <h4 class="text-info">{{$fct->desde}} - {{$fct->hasta}}</h4>
            </div>
        </li>    
@endforeach
</ul>
