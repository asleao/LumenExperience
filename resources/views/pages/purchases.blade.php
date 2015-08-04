@extends('layouts.sbadmin2')
@section('brand-title')
Compras
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Compras buscadas
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-purchase">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Data da Compra</th>  
                                <th>Cliente</th>  
                                <th>Vendedor</th>
                                <th>Estoque</th>
                                <th>Detalhar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchases as $purchase)
                            <tr>
                                <td>{{$purchase->id}}</td>
                                <td>{{$purchase->created_at}}</td> 
                                <td>{{$purchase->customer->name}}</td>
                                <td>{{$purchase->employee->name}}</td>                              
                                <td>{{$purchase->stock->name}}</td>
                                <td>
                                    <a class="btn btn-default" href="/purchase/view/{{$purchase->id}}">
                                        Visualizar
                                    </a>
                                </td>
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