<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap');
        
        body{
            margin: 0;
            font-family: 'Poppins', sans-serif;
            color: rgb(226, 239, 239);
            background: #091625;    
        }

        h1{
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        h3{
            display: flex;
            justify-content: center;
        }

        .infos{
            padding: 15px;
            display: flex;
            justify-content: center;
            align-items:center;
            flex-direction: column;
        }

        ul{
            list-style-type: none;
            padding: 10px;
        }

    </style>
    <title>Cidadão de olho</title>
</head>
<body>
    
    <h1>Cidadão de olho</h1>

    <div class='infos'>
        <div class='redes_usadas'>
            <h3>Redes mais usadas</h3>
            <p>Confira as redes mais usadas pelos deputados! </p>
            <ul>
                @foreach ($redes as $rede)
                <li> {{ $rede->nome }} - ({{ $rede->quant }}) usuários </li>
                @endforeach
            </ul>
        </div>
    
        <div class='deputados_verbas'>
            <h3>Verbas indenizatórias</h3>
            <p>Confira quais são os deputados que mais pediram reembolso de verbas indenizatórias em 2019!</p>
            <ul>
                @for ($i = 0; $i < 5; $i++)
                    <li> {{ $deputados[$i]->nome }} - ({{ $deputados[$i]->quant }}) vezes </li>
                @endfor
            </ul>
        </div>
    </div>
    
</body>
</html>
