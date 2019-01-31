@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
@stop

@section('content')

	<div class="row">
		<div class="col-md-6">
		  <div class="box-body">
			<form action="{{ route('papeis.update',$registro->id) }}" method="post">

			{{csrf_field()}}
			{{ method_field('PUT') }}
			@include('painel.gerenciamento.papel._form')

			<button class="btn btn-primary">Atualizar</button>

				
			</form>
		</div>
	  </div>
	</div>

<!--
<div class="modal fade" id="modal_template2" tabindex="-1" role="dialog" aria-labelledby="modal_template" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 80%">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Template</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	<form action="{{ route('papeis.update',$registro->id) }}" method="post">

			{{csrf_field()}}
			{{ method_field('PUT') }}
			@include('painel.gerenciamento.papel._form')

			<button class="btn btn-primary">Atualizar</button>

				
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
-->
@stop