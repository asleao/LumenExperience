@extends('layouts.sbadmin2')
@section('brand-title')
Fornecedores
@stop
@section('content')
<div class="panel panel-default" ng-controller="PurchaseController">
    <div class="panel-heading">
        Adicionar Fornecedor
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form action="/supplier/add" method="POST">
                    <div class="form-group">
                        <label for = "name">Nome: </label>
                        <input id ="name" name="name" class ="form-control"/>
                    </div>
                    
                    <div class="form-group">
                        <label for = "cnpj">CNPJ: </label>
                        <input id="cnpj" name="cnpj" class ="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for = "phone">Telefone: </label>
                        <input id="phone" name="phone" class ="form-control" />
                    </div>                    
                    <div class="form-group">
                        <label for = "address">Endereço: </label>                        
                        <input id= "address" name="address" class ="form-control" />
                    </div>
                    <br/>
                    <br/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success pull-right"> Salvar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
@stop
@section('custom-scripts')
{!! HTML::script('bower_components/datatables/media/js/jquery.dataTables.min.js') !!}
{!! HTML::script('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js" type="text/javascript"></script>

<script>
    $(document).ready(function () {
        $('#dataTables-employees').DataTable({
            responsive: true
        });
        $("#data").mask("9999-99-99",{placeholder:"____/__/__"});
        $("#phone").mask("9999-9999",{placeholder:"____-____"});
        $("#cnpj").mask("99.999.999/9999-99",{placeholder:"__.___.___/____-__"});
    });
    
</script>
@stop
