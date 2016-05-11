<table class="table table-responsive">
    <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($imagenes3s as $imagenes3)
        <tr>
            <td>{!! $imagenes3->id !!}</td>
            <td>{!! $imagenes3->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['imagenes3s.destroy', $imagenes3->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('imagenes3s.show', [$imagenes3->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('imagenes3s.edit', [$imagenes3->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>