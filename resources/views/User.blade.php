<?php 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
    <tbody>
        <td>Id</td>
        <td>Name</td>
        <td>Lastname</td>
        <td>Action</td>
        @foreach($users as $us )
        <tr>
            <td>{{ $us->id }}</td>
            <td>{{ $us->name }}</td>
            <td>{{ $us->lastname }}</td>
            <td>
                <a href="/User/edit?id={{ $us->id }}">Editar</a>/
                <a href="/User/delete?id={{ $us->id }}">Eliminar</a>
                </td>
        </tr>
        @endforeach
    </tbody>
    </table>
</body>
</html>