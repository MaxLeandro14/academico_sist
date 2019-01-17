@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
<h1>Minhas Turmas</h1>
@stop

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Turmas</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form">
    <div class="box-body">
      <table id="tabela" class="table tabela" pageLength='10' aaSorting='0 asc'>
        <thead>
          <tr>
          <th>Código</th>
          <th>Disciplina(s)</th>
          <th>Série</th>
          <th>Ano</th>
          <th>Status</th>
          <th><a href="{{ route('turma') }}">Meu diário <i class="fa fa-external-link"></i></a></th>
          </tr>
        </thead>

        <tbody>
            <tr>
                <td>01212</td>
                <td>System Architect</td>
                <td>1</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td><a href="#">1B</a> <a href="#">2B</a> <a href="#">3B</a> <a href="#">4B</a></td>
            </tr>
            <tr>
                <td>151545</td>
                <td>Accountant</td>
                <td>4</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>1B 2B 3B 4B</td>
            </tr>
            <tr>
                <td>4645</td>
                <td>Junior Technical Author</td>
                <td>5</td>
                <td>66</td>
                <td>2009/01/12</td>
                <td>1B 2B 3B 4B</td>
            </tr>
            <tr>
                <td>54654</td>
                <td>Senior Javascript Developer</td>
                <td>8</td>
                <td>22</td>
                <td>2012/03/29</td>
                <td>1B 2B 3B 4B</td>
            </tr>
          </tbody>
      </table>
    </div>
  </form>
</div>

@stop