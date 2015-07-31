<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Compra</title>
        <meta charset="utf8">
</head>
<body>
    <h3>Compra de paradas</h3>
    <form action="/purchase/add" method="POST">
        Stock
        <select name="stock_id">
            @foreach ($stocks as $stock)
            <option value="{{$stock->id}}">{{$stock->name}}</option>
            @endforeach
        </select>
        
        
        <div id="products">
            <table>
                <thead>
                    <th>Item</th>
                    <th>Quantity</th>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>
                            <input type="checkbox" class="products" name="products[]" value="{{$product->id}}"/>
                            <label>{{$product->name}}</label>
                        </td>
                        <td>
                            <input readonly="true" type='number' min='1' name='{{$product->id}}_ammount' id='{{$product->id}}_ammount'/><br>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <input type="submit" />
    </form>
</body>
<!--JQuery-->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
    $(document).ready(function(){
        $('input[type="checkbox"].products').change(function() {
            var qtdField = $('input#'+this.value+'_ammount');
            if(this.checked) {
                $(qtdField).removeAttr('readonly');
                if(! $(qtdField).val() || $(qtdField).val() === ""){
                    $(qtdField).val(1);
                }
            }else{
                $(qtdField).attr('readonly','true');
                 $(qtdField).val('');
            }
        });
    })
</script>
</html>
