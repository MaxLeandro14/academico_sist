@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
<h1>Papéis</h1>
@stop
@section('content')
<div class="row">
<div class="col-md-6">

	<form role="form" action="{{route('usuarios.papel.store', $usuario->id)}}" method="post">
		{{ csrf_field() }}
		<div class="box-header">
     	  <h3 class="box-title">Adicionar papel para {{$usuario->name}}</h3>
    	</div>
			<select class="form-control select2_papeis" multiple="multiple" name="papel_id[]">
			        @foreach($papeis as $valor)
			            <option value="{{$valor->id}}">{{$valor->nome}}</option>
			        @endforeach
			</select>

			<div class="box-header">
          		<button type="submit" class="btn btn-block btn-primary btn-sm">Adicionar</button>
            </div>
     </form>
</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="box-header">
	       <h3 class="box-title">Papéis deste usuário</h3>
	    </div>
		<table class="table table-striped">
	             <tbody>
	             	@foreach($usuario->papeis as $papel)
	                <tr>
	                
	                  <td>{{$papel->nome}}</td>
	                  <td>{{$papel->descricao}}</td>
	                   <td>
	                   	<form action="{{route('usuarios.papel.destroy', [$usuario->id, $papel->id])}}" method="POST">
		              	{{ method_field('DELETE')}}
		             	{{ csrf_field() }}
		              	<button type="submit" class="badge bg-red">Remover</button>
		             </form>
		        	 </td>
	              
	                </tr>
	                 @endforeach
	              </tbody>
	          </table>
		
	 </div>
  </div>



@stop