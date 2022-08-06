    <h1>{{ $modo }} empleado</h1>
    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form-group">
        <input type="text" name="nombre" class="form-control" value="{{ isset($empleado->nombre)?$empleado->nombre:old('nombre') }}" placeholder="nombre">
        <br>
        <input type="text" name="apellidoPaterno" class="form-control" value="{{ isset($empleado->apellidoPaterno)?$empleado->apellidoPaterno:old('apellidoPaterno') }}" placeholder="Apellido Paterno">
        <br>
        <input type="text" name="apellidoMaterno" class="form-control" value="{{ isset($empleado->apellidoMaterno)?$empleado->apellidoMaterno:old('apellidoMaterno') }}" placeholder="Apellido Materno">
        <br>
        <input type="text" name="correo" class="form-control" value="{{ isset($empleado->correo)?$empleado->correo:old('correo') }}" placeholder="Correo">
        <br>
        <label for="foto">Foto:</label>
        @if(isset($empleado->foto))
            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->foto }}" width="100">
            <br><br>
        @endif
        <input type="file" class="form-control" name="foto">
        <br><br>
        <input type="submit" value="{{ $modo }} datos" class="btn btn-success">
        <a href="{{ url('empleado') }}" class="btn btn-danger">Cancelar</a>
    </div>