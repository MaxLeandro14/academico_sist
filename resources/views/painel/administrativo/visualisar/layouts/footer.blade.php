<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

@if(config('adminlte.plugins.select2'))
<!-- Select2 -->
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2_nivel').select2({
            
            placeholder: "Selecione um Nível",
            
        });

        $('.select2_serie').select2({
            
            placeholder: "Selecione um Ano",
            
        });
        
        $('.select2_professores').select2({
            //maximumSelectionLength: 2
            placeholder: "Adicione Professores",
            
        });

        $('.select2_turno').select2({
            
            placeholder: "Selecione um Turno",
            
        });

        $('.select2_disciplina').select2({
            //maximumSelectionLength: 2
            placeholder: "Selecione disciplinas",
            
        });

        $('.select2_responsavel').select2({
            //maximumSelectionLength: 2
            placeholder: "Selecione um Responsável",
            
        });

        $('.select2_sexo').select2({
            //maximumSelectionLength: 2
            placeholder: "Selecione um Sexo",
            
        });

        $('.select2_situacao').select2({
            //maximumSelectionLength: 2
            placeholder: "Selecione uma Situação",
            
        });

        $('.select2_aluno').select2({
            //maximumSelectionLength: 2
            placeholder: "Adicione Alunos",
            
        });
    });
</script>
@endif

@if(config('adminlte.plugins.datatables'))
<!-- DataTables with bootstrap 3 renderer -->
<script src="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>
<script type="text/javascript">
    var value = document.getElementById("tabela").getAttribute("pageLength");
    pageLength = value*1;
    
    var value = document.getElementById("tabela").getAttribute("aaSorting");
    aaSorting = value[0]*1;
    var i;
    var order = "";

    for(i=2; i<value.length; i++){
        order = order.concat(value[i]);
    }
  $(document).ready(function() {
    $('table.tabela_modal').DataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "pageLength": pageLength,
        "lengthMenu": [ [12, 24, 36, -1], [12, 24, 36, "All"] ],
        "oLanguage": {
            "sLengthMenu": "",
            //"sLengthMenu": "Mostrar _MENU_ registros por página",
            "sZeroRecords": "Nenhum registro encontrado",
            "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
            "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
            "sInfoFiltered": "(filtrado de _MAX_ registros)",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sFirst": "Início",
                "sPrevious": "Anterior",
                "sNext": "Próximo",
                "sLast": "Último"
            }
        },
        "aaSorting": [[aaSorting, order]],
        "aoColumnDefs": [
            {"sType": "num-html", "aTargets": [0]}
 
        ]
    });
} );
</script>
@endif