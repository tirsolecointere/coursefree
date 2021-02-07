<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''), 'placeholder' => 'Escriba un nombre']) !!}
    @error('name')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>
<div class="mb-2">
    <b class="d-block">Permisos</b>
    @error('permissions')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<ul class="list-unstyled">
    @foreach ($permissions as $permission)
        <li>
            <div class="custom-control custom-checkbox">
                {!! Form::checkbox('permissions[]', $permission->id, null, ['id' => 'permission-' . $permission->id, 'class' => 'custom-control-input']) !!}
                {!! Form::label('permission-' . $permission->id, $permission->name, ['class' => 'custom-control-label']) !!}
            </div>
        </li>
    @endforeach
</ul>
