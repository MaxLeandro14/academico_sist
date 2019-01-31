@include('painel.administrativo.templates.layouts.header')

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Turma - {{ $turma_info[0]->codigo_turma }}  </h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="{{ route('cadastra_turma') }}" method="POST" >
    {{csrf_field()}}
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Data de Início</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input value="{{ $turma_info[0]->data_inicial }}" required type="date" class="form-control" placeholder="Data de início" name="data_inicial">
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Data Final</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input value="{{ $turma_info[0]->data_final }}" required type="date" class="form-control" placeholder="Data de início" name="data_final">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>Nível</label>
            <select class="form-control select2_nivel_modal" required name="nivel">
              <option>{{ $turma_info[0]->nivel }}</option>
              <option>Fundamental 1</option>
              <option>Fundamental 2</option>
              <option>Médio</option>
            </select>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label>Ano</label>
            <select class="form-control select2_ano_modal" required name="ano">
              <option>{{ $turma_info[0]->ano }}</option>
              <option>1° ano</option>
              <option>2° ano</option>
              <option>3° ano</option>
              <option>4° ano</option>
              <option>5° ano</option>
              <option>6° ano</option>
              <option>7° ano</option>
              <option>8° ano</option>
              <option>9° ano</option>
            </select>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label>Turno</label>
            <select class="form-control select2_turno_modal" required name="turno">
              <option>{{ $turma_info[0]->turno }}</option>
              <option>Matutino</option>
              <option>Vespertino</option>
              <option>Noturno</option>
            </select>
          </div>
        </div>

        <div class="col-md-5">
          <label for="">Descrição</label>
          <div class="input-group">
            <textarea required rows="5" cols="180" class="form-control" placeholder="Descrição da Turma"  name="descricao">{{ $turma_info[0]->descricao }}</textarea>
          </div>    
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
                <br><br>
              <div class="box-header with-border">
                <h3 class="box-title">Professores da Turma</h3>
              </div>  
              <div>
                <table id="tabela" class="table tabela_modal" pageLength='5' aaSorting='0 asc'>
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Professor</th>
                    <th>Disciplina</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($turma_info as $turma)
                  <tr>
                    <td> {{ $turma->codigo_professor }} </td>
                    <td> {{ $turma->nome_professor }} </td>
                    <td> {{ $turma->nome_disciplina }} </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
      </div>

    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
    </div>
  </form>
</div>

@include('painel.administrativo.templates.layouts.footer')