@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
@stop

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Lista de Papéis</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form">
    <div class="box-body">
      <table id="tabela" class="table tabela" pageLength='10' aaSorting='0 asc'>
        <thead>
          <tr>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Ação</th>
          </tr>
        </thead>

        <tbody>
           @foreach($registros as $registro)
            <tr>
                <td>{{$registro->nome}}</td>
                <td>{{$registro->descricao}}</td>
                <td>
                <form action="{{route('papeis.destroy',$registro->id)}}" method="post">
                  <a title="Editar" class="btn orange" href="{{ route('papeis.edit',$registro->id) }}"><i class="fab fa-500px"></i></a>
                   <a title="Permissões" class="btn blue" href="{{route('papeis.permissao',$registro->id)}}"><i class="material-icons">permissao</i></a>


                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button title="Deletar" class="btn red"><i class="material-icons">delete</i></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
      </table>
    </div>
  </form>
</div>

<a href="{{ route('papeis.create') }}"><button type="button" class="btn btn-primary btn">Adicionar novo</button></a>
@stop