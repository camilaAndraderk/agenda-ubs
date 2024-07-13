<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepcionistas</title>
</head>
<body>
    
    
    @foreach ($recepcionistas as $recepcionista)
        <li> {{ $recepcionista }} </li>
    @endforeach
    
</body>
</html>