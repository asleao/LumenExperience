@extends('layouts.sbadmin2')
@section('brand-title')
Produtos
@stop
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Cadastro de novo produto
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form action="/product/add" method="POST" role="form">
                    <div class="form-group">
                        <label>Estoque</label>
                        <select required="true" name="stock_id" class="form-control">
                            @foreach ($stocks as $stock)
                                <option value="{{$stock->id}}">{{$stock->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nome</label>
                        <input required="true" name="nome" type="text" class="form-control">
                    </div>
                    <label>Preço</label>
                    <div class="form-group input-group">
                        <span class="input-group-addon">R$</span>
                        <input required="true" min="0.01" name="unit_price" type="number" step="any" class="form-control">
                        <span class="input-group-addon">.00</span>
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