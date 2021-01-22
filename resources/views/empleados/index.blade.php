@extends('layout.general')



@section('content')
@include('layout.sidebar')
<div class="col-md-9">

@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
	{{ Session::get('Mensaje') }}
</div>

@endif

<a href="{{ url('empleados/create') }}" class="btn btn-success">Agregar Empleado</a>
<br>


<br>
<table class="table table-light table-hover" >

	<thead class="thead-light">
		<tr>
			<th>#</th>
			<th>Foto</th>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Acciones</th>
		</tr>

	</thead>

	<tbody>
		@foreach($empleados as $empleado)
		<tr>
			<td>{{$loop->iteration}}</td>
			<td>
			 <img src="{{ asset('storage').'/'.'app'.'/'.'public'.'/'.$empleado->Foto}}" alt="" class="img-thumbnail img-fluid" alt="" width="150">


			</td>
			<td>{{ $empleado->Nombre}} {{ $empleado->ApellidoPaterno}} {{ $empleado->ApellidoMaterno}}</td>
			<td>{{ $empleado->Correo}}</td>
			<td>
			<a class="btn btn-warning" href="{{ url('/empleados/'.$empleado->id.'/edit') }}">
			Editar
			</a>

			<form method="post" action="{{ url('/empleados/'.$empleado->id )}}" style="display: inline">
			{{csrf_field() }}
			{{ method_field('DELETE') }}
			<button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?')">Borrar</button>
			</form>


			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
@endsection