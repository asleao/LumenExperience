@extends('layouts.sbadmin2')
@section('brand-title')
Compras
@stop
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Filtrar Compras
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form action="/sale/filter" method="GET">
                    <div class="form-group row">
                        <div class="form-group col-lg-6">
                            <label for = "name">Data Inicial: </label>
                            <input type="date" id ="dataIni" name="dataIni" class ="form-control"/>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for = "cnpj">Data Final: </label>
                            <input type="date" id="dataFim" name="dataFim" class ="form-control"/>
                        </div>
                    </div>
                    
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
        $("#cnpj").mask("99.999.99",{placeholder:"__.___.__"});
    });
    
</script>
@stop
