<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cidadao de olho</title>
</head>
<body>
    
    <h1>Cidadao de olho</h1>

    <div class='redes_usadas'>
        <h3>Redes mais usadas</h3>
        <p>Confira as redes mais usadas pelos deputados! </p>
        <ul>
            @foreach ($redes as $rede)
                <li> {{ $redes[$i]->nome }} ({{ $redes[$i]->quant }}) usuários </li>
            @endforeach
        </ul>
    </div>

    <div class=>

    </div>
</body>
</html>