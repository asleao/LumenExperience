@extends('layouts.sbadmin2')
@section('brand-title')
Estoques
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Estoques Cadastrados
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-stocks">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>  
                                <th>Tipo</th>  
                                <th>Estoquista</th>
                                <th>Detalhar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stocks as $stock)
                            <tr>
                                <td>{{$stock->id}}</td>
                                <td>{{$stock->name}}</td> 
                                <td>{{$stock->type}}</td>
                                <td>{{$stock->stocker->name}}</td>                               
                                <td>
                                    <a class="btn btn-default" href="/stock/{{$stock->id}}">
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