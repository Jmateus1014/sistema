@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('mensaje'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('mensaje') }}
            </div>
        @endif
        <a href="{{ url('empleado/create') }}" class="btn btn-success">Registrar nuevo empleado</a>
        <br><br>
        <table class="table table-light">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->id }}</td>
                        <td>
                            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->foto }}" width="100">
                        </td>
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->apellidoPaterno }}</td>
                        <td>{{ $empleado->apellidoMaterno }}</td>
                        <td>{{ $empleado->correo }}</td>
                        <td>

                        <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-warning">
                            Editar
                        </a>
                        
                        |

                        <form action="{{ url('/empleado/'.$empleado->id) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Borrar" class="btn btn-danger" onclick="return confirm('¿Quieres borrar el registro?');">
                        </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $empleados->links() !!}
    </div>
@endsection