@extends ('admin/layout')

@section ('title') Datos de Usuario @stop

@section ('content')

  <h1>Datos de Usuario</h1>

  <p>
    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Ver Lista General</a>
  </p>
  
  <table class="table table-striped">
    <tr>
        <th>Full name</th>
        <th>Email</th>
    </tr>
    <tr>
        <td>{{ $user->full_name }}</td>
        <td>{{ $user->email }}</td>
    </tr>
  </table>

@stop