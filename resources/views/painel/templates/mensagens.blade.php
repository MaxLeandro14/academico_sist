<style type="text/css">
	.alert-success
	{
		background-color: #b2f5b2!important;
		color: #333!important;
		border-color: #ddffdd!important;
	}
</style>
@if(isset($mensagem_sucesso))
<div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p><strong>{{ $mensagem_sucesso }}</strong></p>
</div>
@elseif(isset($mensagem_falha))
<div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p><strong>{{ $mensagem_falha }}</strong></p>
</div>
@endif