

<!-- Submit Field -->


<div class="form-group col-sm-12">
        {!!Form::label('nombre','Nombre:')!!}
        {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
    </div>
    <div class="form-group col-sm-12">
        {!!Form::label('descripcion','Descripcion:')!!}
        {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
    </div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tipos.index') !!}" class="btn btn-default">Cancel</a>
</div>
