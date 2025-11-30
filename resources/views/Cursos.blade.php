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
        <td>Id</td>
        <td>Name</td>
        <td>Temario</td>
        <td>Activo</td>
        @foreach($cursos as $u )
        <tr>
               <td>{{ $u->id }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->temario }}</td>
                    <td>{{ $u->activo }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
</body>
</html>