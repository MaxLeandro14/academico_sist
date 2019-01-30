@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
<h1>Editar papel</h1>
@stop

@section('content')

	<div class="row">
		<div class="col-md-6">
		  <div class="box-body">
			<form action="{{ route('papeis.update',$registro->id) }}" method="post">

			{{csrf_field()}}
			{{ method_field('PUT') }}
			@include('painel.administrador.papel._form')

			<button class="btn btn-primary">Atualizar</button>

				
			</form>
		</div>
	  </div>
	</div>
	
@stop