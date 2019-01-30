@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
<h1>Usuários do Sistema</h1>
@stop

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Usuários</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form">
    <div class="box-body">
      <table id="tabela" class="table tabela" pageLength='10' aaSorting='0 asc'>
        <thead>
          <tr>
          <th>Código</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Papeis</th>
          </tr>
        </thead>

        <tbody>
           @foreach($usuarios as $usuario)
              @if($usuario->codigo != 'MASTER')
                <tr>
                    <td>{{$usuario->codigo}}</td>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                    <td><a href="{{route('usuarios.papel', $usuario->id)}}"><i class="fas fa-sitemap"></i></a></td>
                </tr>
              @endif
            @endforeach
          </tbody>
      </table>
    </div>
  </form>
</div>

@stop