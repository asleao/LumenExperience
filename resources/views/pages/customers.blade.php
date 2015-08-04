@extends('layouts.sbadmin2')
@section('brand-title')
Clientes
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Clientes Cadastrados
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-customers" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>                                
                                <th>CPF</th>
                                <th>Telefone</th>
                                <th>Data de Nascimento</th>
                                <th>Endereço</th>
                                <th>Data de Criação</th>
                                <th>Data de Modificação</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{$customer->id}}</td>
                                <td>{{$customer->name}}</td>                                
                                <td>{{$customer->cpf}}</td>
                                <td>{{$customer->phone}}</td>
                                <td>{{$customer->birth_date}}</td>
                                <td>{{$customer->address}}</td>
                                <td>{{$customer->created_at}}</td>
                                <td>{{$customer->updated_at}}</td>
                                <td><a class="btn btn-default fa-edit" href=""/></td>
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
        $('#dataTables-customers').DataTable({
            responsive: true
        });
    });    
</script>
@stop