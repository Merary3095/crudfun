@extends('layout.general')
@section('menu')
<div class="col-md-3">
    <div class="card">
        <div class="card-header">
<img src="{{ asset('storage').'/'.'uploads'.'/'.'1pR8JnYGtygJStzvO5OKp6NvTi3u957Hr12NTiX7.jpeg'}}" alt="150" class="img-thumbnail img-fluid" alt="" width="300">
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Barra de navegacion
        </div>

        <div class="card-body">
            <ul>
            <li><a href="/productos"><em class="icon-reorder">&nbsp;</em> Productos</a></li>
            <li class="active"><a href="/categorias"><em class="icon-sitemap">&nbsp;</em> Categorias</a></li>
            <li><a href="charts.html"><em class="icon-exchange">&nbsp;</em> Ventas</a></li>
            <li><a href="elements.html"><em class="icon-shopping-cart">&nbsp;</em> Mis compras</a></li>
 </ul>
        </div>
    </div>
</div>
@endsection
@section('content')

<div class="col-md-9">

<form action="{{ url('/empleados/'.$empleado->id) }}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('empleados.form',['Modo'=>'editar'])

</form>
</div>
@endsection