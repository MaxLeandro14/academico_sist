@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
<h1>Adicionar papel</h1>
@stop

@section('content')

	<div class="row">
		<div class="col-md-6">
			<div class="box-body">
			<form action="{{ route('papeis.store') }}" method="post">

			{{csrf_field()}}
			@include('painel.administrador.papel._form')

			<button class="btn btn-primary">Adicionar</button>

				
			</form>
		  </div>
	  </div>
	</div>

@stop