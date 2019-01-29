@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
<h1>Permissões</h1>
@stop
@section('content')
<div class="row">
<div class="col-md-6">

  <form role="form" action="{{route('papeis.permissao.store', $papel->id)}}" method="post">
    {{ csrf_field() }}
    <div class="box-header">
        <h3 class="box-title">Adicionar permissão para {{$papel->nome}}</h3>
      </div>
      <select class="form-control select2_permissao" multiple="multiple" name="permissao_id[]">
              @foreach($permissao as $valor)
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
         <h3 class="box-title">Permissões deste Papel</h3>
      </div>
    <table class="table table-striped">
               <tbody>
                @foreach($papel->permissoes as $permissao)
                  <tr>
                  
                    <td>{{$permissao->nome}}</td>
                    <td>{{$permissao->descricao}}</td>
                     <td>
                      <form action="{{route('papeis.permisoes.destroy', [$papel->id, $permissao->id])}}" method="POST">
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