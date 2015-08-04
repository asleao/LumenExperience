@extends('layouts.sbadmin2')
@section('brand-title')
Produtos
@stop
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Novo Produto
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form action="/product/add" method="POST" role="form">
                    <div class="form-group">
                        <label>Fornecedores</label>
                        <select required="true" name="supplier_id[]" multiple="true" class="form-control">
                            @foreach ($suppliers as $supplier)
                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nome</label>
                        <input required="true" name="name" type="text" class="form-control">
                    </div>
                    <label>Preço</label>
                    <div class="form-group input-group">
                        <span class="input-group-addon">R$</span>
                        <input required="true" min="0.01" name="unit_price" type="number" step="any" class="form-control">
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