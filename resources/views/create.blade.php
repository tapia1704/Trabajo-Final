<?php 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creater</title>
</head>
<body>
    <h1>Crear usuario</h1>
    <form action="/User/store" method="POST">
        @csrf
        <label for="">ID</label>
        <br>
        <input type="text" name="id" >
        <br>
        <label for="">Name</label>
        <br>
        <input type="text" name="name">
        <br>
        <label for="">LastName</label>
        <br>
        <input type="text" name="lastname">
        <br>
        <input type="submit" value="Create">
    </form>
</body>
</html>