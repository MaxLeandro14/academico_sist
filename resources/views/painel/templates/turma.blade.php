@include('painel.templates.layouts.header')
@if(isset($mostra_footer_header))
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Turma - @if(isset($turma_info)){{ $turma_info->codigo_turma }} @endif </h3>
  </div>
@endif
  <!-- /.box-header -->
  <!-- form start -->
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Data de Início</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input @if(isset($turma_info)) value="{{ $turma_info->data_inicial }}" disabled @endif required type="date" class="form-control" placeholder="Data de início" name="data_inicial">
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Data Final</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input @if(isset($turma_info)) value="{{ $turma_info->data_final }}" disabled @endif required type="date" class="form-control" placeholder="Data de início" name="data_final">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>Nível</label>
            <select @if(isset($turma_info)) disabled @endif class="form-control select2_nivel" required name="nivel" id="nivel" onselect="ano_nivel();" onchange="ano_nivel();">
              <option>@if(isset($turma_info)){{ $turma_info->nivel }}@endif</option>
              <option>Fundamental 1</option>
              <option>Fundamental 2</option>
              <option>Médio</option>
            </select>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label>Ano</label>
            <select @if(isset($turma_info)) disabled @endif class="form-control select2_ano" required name="ano" id="ano">
              <option>@if(isset($turma_info)){{ $turma_info->ano }}@endif</option>
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
            <select @if(isset($turma_info)) disabled @endif class="form-control select2_turno" required name="turno">
              <option>Matutino</option>
            </select>
          </div>
        </div>

        <div class="col-md-5">
          <div class="form-group">
            <label>Turno</label>
            <input type="text" required class="form-control" placeholder="Descrição da Turma"  name="descricao" @if(isset($turma_info)) disabled  value="{{ $turma_info->descricao }}"@endif>
          </div>    
        </div>
      </div>
      @if(isset($mostra_professores_turma))
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
                  @foreach($professores_turma as $professor)
                  <tr>
                    <td> {{ $professor->codigo_professor }} </td>
                    <td> {{ $professor->nome }} </td>
                    <td> {{ $professor->nome_disciplina }} </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
      </div>
      @include('painel.templates.layouts.footer')
      @endif

@if(isset($mostra_footer_header))
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
    </div>
</div>
@endif

