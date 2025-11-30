<?php 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
</head>
<body>
    <h1>Actualizar Usuario</h1>
    <form action="/User/update" method="POST">
        @csrf
        <label for="">ID</label>
        <br>
        <input type="text" name="id" value="{{$_GET['id']}}">
        <br>
        <label for="">Name</label>
        <br>
        <input type="text" name="name">
        <br>
        <label for="">LastName</label>
        <br>
        <input type="text" name="lastname">
        <br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>