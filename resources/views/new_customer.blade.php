<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Cliente</title>
        <meta charset="utf8">
</head>
<body>
    <form action="/customer/add" method="POST">
        Name
        <input name="name" />
        CPF
        <input name="cpf" />
        Phone
        <input name="phone" />
        Birth Date
        <input name="birth_date" />
        Address
        <input name="address" />
        <input type="submit" />
    </form>
</body>
</html>