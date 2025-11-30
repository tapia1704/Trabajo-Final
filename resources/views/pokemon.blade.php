<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokemon</title>
     
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body style="background: #e3f5ff">
    <div class="container mt-4">
    <h1 class="text-center mb-4">Lista de Pokémon</h1>
    <table class="table table-dark table-bordered table-hover text-center align-middle bg-white">
        
    <Tbody class="table-success"> 
        <td>ID</td>
        <td>Name</td>
        <td>Normal Forma</td>
        <td>Shyni Forma</td>
        
        @foreach($LocalPokemon as $p )
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->name }}</td>
            <td><img src="{{ $p->image }}" alt="{{ $p->name }}"></td>
             <td><img src="{{ $p->imageS }}" alt="{{ $p->name }} Shiny"></td>
        </tr>
        @endforeach
        
    </Tbody>
    </table>
    </div>
</body>
</html>