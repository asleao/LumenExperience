@extends('layouts.sbadmin2')
@section('brand-title')
Produtos
@stop
@section('content')
<div class="panel panel-default" ng-controller="PurchaseController">
    <div class="panel-heading">
        Venda de Produto
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form action="/sale/add" method="POST" role="form">
                    <div class="form-group">
                        <label>Cliente</label>
                        <select required="true" name="customer_id[]"  class="form-control">
                            @foreach ($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Vendedor</label>
                        <select required="true" name="employee_id[]"  class="form-control">
                            @foreach ($employees as $employee)
                                <option value="{{$employee->id}}">{{$employee->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Estoque</label>
                        
                        <input type="hidden" name="stock_id" value="@{{stock_id}}"/>
                        
                        <select  class="form-control" ng-options="stock.id as stock.name for stock in stocks" ng-model="stock_id" 
                                ng-change="loadProducts()">
                        </select>
                    </div>

                    <div id="products">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <th>Item</th>
                            <th>Quantity</th>
                            </thead>
                            <tbody>
                                <tr ng-repeat="product in products">
                                    <td>
                                        <input type="checkbox" class="products" name="products[]" value="@{{product.id}}" ng-model="checked[product.id].checked"/>
                                        <label>@{{product.name}}</label>
                                    </td>
                                    <td>
                                        <input ng-disabled="! checked[product.id].checked"  ng-show="checked[product.id].checked" type='number' min='1' name='@{{product.id}}_ammount' required="required" id='@{{product.id}}_ammount'/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
@section('custom-scripts')
<script>

            angular.module("StockController").controller("PurchaseController", function($http, $scope){

            $scope.stock_id;
            $scope.products = [];
            $scope.stocks = [
                    @foreach($stocks as $stock)
                        {!!$stock!!},
                    @endforeach
            ];
            
            $scope.checked = [
                    
            ];
            $scope.loadProducts = function(){

            var id = $scope.stock_id;
                    $http.get("/stock/" + id + '/products')
                    .success(function(data){
                        $scope.products = data;
                        for(var i = 0; i < data.length; i++){
                            $scope.checked[data[i].id] = {id: data[i].id, checked:false};
                        }
                    })
            }

    $
    });
            

</script>
@stop