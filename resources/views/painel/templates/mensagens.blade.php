
@if(session('mensagem_sucesso'))
<div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p><strong>{{ session('mensagem_sucesso') }}</strong></p>
</div>
@elseif(session('mensagem_falha'))
<div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p><strong>{{ session('mensagem_falha') }}</strong></p>
</div>
@endif