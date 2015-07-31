<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Compra</title>
        <meta charset="utf8">
</head>
<body>
    <form action="/product/add" method="POST">
        Name
        <input name="name" />
        Stock
        <select name="stock_id">
            @foreach ($stocks as $stock)
                <option value="{{$stock->id}}">{{$stock->name}}</option>
            @endforeach
        </select>
        Unit Price
        <input type="number" name="unit_price" min="0">
        <button type="submit">Send!</button>
    </form>
</body>
</html>
