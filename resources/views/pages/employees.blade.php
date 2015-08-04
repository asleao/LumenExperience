@extends('layouts.sbadmin2')
@section('brand-title')
Funcionarios
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Funcionarios Cadastrados
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-employees">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>  
                                <th>Tipo</th>  
                                <th>CPF</th>
                                <th>Data de Nascimento</th>
                                 <th>Telefone</th>                                
                                <th>Endereço</th>                                
                                <th>Data de Criação</th>
                                <th>Data de Modificação</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->name}}</td> 
                                <td>{{$employee->type}}</td>
                                <td>{{$employee->cpf}}</td>                                
                                <td>{{$employee->birth_date}}</td>
                                <td>{{$employee->phone}}</td>
                                <td>{{$employee->address}}</td>                                
                                <td>{{$employee->created_at}}</td>
                                <td>{{$employee->updated_at}}</td>
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