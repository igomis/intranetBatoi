<!-- Modal -->
<div class="modal fade" id="AddInstructor" tabindex="-1" role="dialog" aria-labelledby="AddInstructorTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="AddInstructorTitle">{{trans("models.modelos.Instructor")}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </h4>    
            </div>
            <form method="POST" class="agua" action="/colaboracion/create">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <select name='idCiclo' class="form-control">
                        @foreach ($ciclos as $ciclo)
                            @if (\Intranet\Entities\Grupo::QTutor()->first() && \Intranet\Entities\Grupo::QTutor()->first()->idCiclo == $ciclo->id)
                                <option value='{{ $ciclo->id }}' selected>{!! $ciclo->ciclo !!}</option>
                            @else    
                                <option value='{{ $ciclo->id }}'>{!! $ciclo->ciclo !!}</option>
                            @endif    
                        @endforeach
                    </select>
                    <select name='idCentro' class="form-control">
                        @foreach ($elemento->centros as $centro)
                        <option value='{{ $centro->id }}'>{!! $centro->nombre !!} ({!! $centro->direccion !!})</option>
                        @endforeach
                    </select>
                    <input type='text'  id='contacto_id' name='contacto' placeholder="{{trans("validation.attributes.contacto")}}" value="{{ old('contacto') }}" class="form-control">
                    <input type="text"  name="telefono" placeholder="{{trans("validation.attributes.telef1")}}" value="{{ old('telefono') }}" class="form-control" />
                    <input type="text" name="email" placeholder="{{trans("validation.attributes.email")}}" value="{{ old('email') }}" class="form-control"/>
                    <input type="text"  name="tutor" placeholer="{{trans("validation.attributes.tutor")}}"  class="form-control" value='{{AuthUser()->nombre}} {{AuthUser()->apellido1}}'/>
                    <input type="text"  name="puestos" placeholder="{{trans("validation.attributes.puestos")}}*" value="{{ old('puestos') }}" class="form-control" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input id="submit" class="boton" type="submit" value="{{trans("messages.generic.anadir")}} {{trans("models.modelos.Colaboracion")}} ">
                </div>
            </form>    
        </div>
    </div>
</div>
