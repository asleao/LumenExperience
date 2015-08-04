@extends('layouts.sbadmin2')
@section('brand-title')
Estoque
@stop
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Novo Estoque
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form action="/stock/add" method="POST" role="form">

                    <div class="form-group">
                        <label>Nome</label>
                        <input required="true" name="name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tipo</label>
                        <select name="type" class="form-control">
                            @foreach ($types as $type)
                            <option>{{$type}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Estoquista</label> 
                        <select name="employee_id" class="form-control">
                            @foreach ($employees as $employee)
                            <option value="{{$employee->id}}">{{$employee->name}}</option>
                            @endforeach
                        </select>
                    </div>    
                    <div class="form-group">
                        <label>Produtos</label>
                        <select required="true" name="product_id[]" multiple="true" class="form-control">
                            @foreach ($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    
                    <button type="submit" class="btn btn-default">Enviar</button>
                    <!--                    <button type="reset" class="btn btn-default">Limpar</button>-->
                </form>
            </div>
            <!-- /.col-lg-6 (nested) -->
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
@stop