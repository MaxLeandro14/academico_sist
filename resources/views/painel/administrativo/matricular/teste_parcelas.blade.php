<form action="{{ route('cadastra_parelas') }}" method="POST" >
    {{csrf_field()}}
    <input type="text" name="id_turma" value="">

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Salvar</button>
     </div>
  </form>