@extends('layouts.sbadmin2')
@section('brand-title')
Fornecedores
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Fornecedores Cadastrados
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-suppliers">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>                                
                                <th>CNPJ</th>
                                <th>Telefone</th>                                
                                <th>Endereço</th>
                                <th>Data de Criação</th>
                                <th>Data de Modificação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suppliers as $supplier)
                            <tr>
                                <td>{{$supplier->id}}</td>
                                <td>{{$supplier->name}}</td>                                
                                <td>{{$supplier->cnpj}}</td>
                                <td>{{$supplier->phone}}</td>                                
                                <td>{{$supplier->address}}</td>
                                <td>{{$supplier->created_at}}</td>
                                <td>{{$supplier->updated_at}}</td>
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
        $('#dataTables-suppliers').DataTable({
            responsive: true
        });
    });
</script>
@stop