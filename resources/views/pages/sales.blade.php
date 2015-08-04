@extends('layouts.sbadmin2')
@section('brand-title')
Vendas
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Vendas buscadas
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-stocks">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Data da Venda</th>  
                                <th>Cliente</th>  
                                <th>Vendedor</th>
                                <th>Estoque</th>
                                <th>Detalhar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sales as $sale)
                            <tr>
                                <td>{{$sale->id}}</td>
                                <td>{{$sale->created_at}}</td> 
                                <td>{{$sale->customer->name}}</td>
                                <td>{{$sale->employee->name}}</td>                              
                                <td>{{$sale->stock->name}}</td>
                                <td>
                                    <a class="btn btn-default" href="/sale/view/{{$sale->id}}">
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