<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Estoque</title>
        <meta charset="utf8">
</head>
<body>
    <form action="/stock/add" method="POST">
        Name
        <input name="name" />
        Type
        <select name="type">
            @foreach ($types as $type)
                <option>{{$type}}</option>
            @endforeach
        </select>
        Stocker
        <select name="employee_id">
            @foreach ($employees as $employee)
                <option value="{{$employee->id}}">{{$employee->name}}</option>
            @endforeach
        </select>
        <input type="submit" />
    </form>
</body>
</html>