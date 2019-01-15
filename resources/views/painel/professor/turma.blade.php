@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
    <h1>Detalhes da Turma</h1>
@stop

@section('content')

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Informações da Turma</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  
  <form role="form">
    <div class="box-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Professor</label>
            <input type="text" class="form-control" placeholder="Nome do aluno" name="nome_aluno">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Disciplina</label>
            <input type="text" class="form-control" placeholder="Nome do aluno" name="nome_aluno">
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-group">
            <label for="">Série</label>
            <input type="text" class="form-control" placeholder="Nome do aluno" name="nome_aluno">
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="">Turno</label>
            <input type="text" class="form-control" placeholder="Nome do aluno" name="nome_aluno">
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-group">
            <label for="">Ano</label>
            <input type="text" class="form-control" placeholder="Nome do aluno" name="nome_aluno">
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="">Data de início</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input type="date" class="form-control" placeholder="Data de início" name="data_nascimento">
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="">Data de Término</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input type="date" class="form-control" placeholder="Data de início" name="data_nascimento">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Descrição</label>
            <textarea class="form-control" rows="3" ></textarea>
          </div>
        </div>
      </div>
      <hr>
      <table id="tabela" class="table" pageLength='10' aaSorting='0 asc'>
        <thead>
          <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Nota 1</th>
          <th>Nota 2</th>
          <th>Nota 3</th>
          <th>Nota 4</th>
          </tr>
        </thead>

        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009/01/12</td>
                <td>$86,000</td>
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012/03/29</td>
                <td>$433,060</td>
            </tr>
            <tr>
                <td>Airi Satou</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td>2008/11/28</td>
                <td>$162,700</td>
            </tr>
            <tr>
                <td>Brielle Williamson</td>
                <td>Integration Specialist</td>
                <td>New York</td>
                <td>61</td>
                <td>2012/12/02</td>
                <td>$372,000</td>
            </tr>
            <tr>
                <td>Herrod Chandler</td>
                <td>Sales Assistant</td>
                <td>San Francisco</td>
                <td>59</td>
                <td>2012/08/06</td>
                <td>$137,500</td>
            </tr>
            <tr>
                <td>Rhona Davidson</td>
                <td>Integration Specialist</td>
                <td>Tokyo</td>
                <td>55</td>
                <td>2010/10/14</td>
                <td>$327,900</td>
            </tr>
            <tr>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>39</td>
                <td>2009/09/15</td>
                <td>$205,500</td>
            </tr>
          </tbody>
      </table>
    </div>
  </form>

</div>

@stop