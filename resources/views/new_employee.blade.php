<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Funcionario</title>
        <meta charset="utf8">
</head>
<body>
    <form action="/employee/add" method="POST">
        Name
        <input name="name" />
        Tipo
        <select name="type">
            @foreach ($types as $type)
                <option>{{$type}}</option>
            @endforeach
        </select>
        CPF
        <input name="cpf" />
        Phone
        <input name="phone" />
        Birth Date
        <input type="date" name="birth_date" />
        Address
        <input name="address" />
        <input type="submit" />
    </form>
</body>
</html>
