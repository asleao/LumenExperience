@extends('layouts.sbadmin2')
@section('brand-title')
Venda
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Detalhes da venda
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-sale-products">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product['productId']}}</td>
                                <td>{{$product['name']}}</td> 
                                <td>{{$product['unit_price']}}</td>
                                <td>{{$product['ammount']}}</td>                     
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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

<script>
    $(document).ready(function () {
        $('#dataTables-employees').DataTable({
            responsive: true
        });
    });
</script>
@stop