<div class="panel">
    <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        <h4 class="panel-title"><i class="fa fa-bars"></i> {{trans("models.Actividad.profesores")}}</h4>
    </a>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div id="{{$elemento->id}}" class="panel-body">
            <table class="table table-striped table-condensed">
                <tr><th>DNI</th> <th>{{trans("validation.attributes.name")}}</th><th>{{trans("validation.attributes.asiste")}}</th><th>{{trans("validation.attributes.operaciones")}}</th></tr>
                @foreach ($sProfesores as $profesor)
                <tr class="lineaProfesor">
                    <td>{!! $profesor->dni !!}</td> 
                    <td>{!! $profesor->apellido1 !!} {!! $profesor->apellido2 !!},{!! $profesor->nombre !!}</td>
                    @if ($profesor->pivot->asiste)
                    <td><input type="checkbox" name="{{$profesor->dni}}" class="checkbox" checked></td>
                    @else
                    <td><input type="checkbox" name="{{$profesor->dni}}" class="checkbox" ></td>
                    @endif
                    <td><a href="/reunion/{!!$elemento->id!!}/borrarProfesor/{!! $profesor->dni !!}" class="delGrupo">{!! Html::image('img/delete.png',trans("messages.buttons.delete"),array('class' => 'iconopequeno','title'=>trans("messages.buttons.delete"))) !!}</a></td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="gruposContainer col-lg-8 col-md-6 col-sm-10 col-xs-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">
            <form method="POST" class="agua" action="/reunion/{!!$elemento->id!!}/nuevoProfesor">
                {{ csrf_field() }}
                <input type='hidden' name='idReunion' value="{!!$elemento->id!!}">
                {{ Form::select('idProfesor',$tProfesores,0,['id'=>'idProfesor']) }}
                <input id="submit" class="boton" type="submit" value="{{trans("messages.generic.anadir")}} {{trans("models.modelos.Profesor")}} ">
            </form>
        </div>
    </div>
</div>
