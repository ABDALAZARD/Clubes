<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Futebol</title>
    <style>
        table, th, td {
          border: 1px solid black;
        }

        th, td {
          padding: 10px;
        }
        </style>
</head>
<body>
    <div class="container">
        <h1><a href="{{route('home')}}">Futebol</a></h1>

        <!-- <h4>Jogadores da seleção do(a) </h4> -->

        <table>
            <tr>
                <th>Nome do jogador</th>
                <th>Posição</th>
                <th>Camisa</th>
                <th>Time atual</th>
                <th>Exclusão</th>
            </tr>

            @foreach ($jogadores as $jogador)

            <tr>
                <td>{{$jogador->nome_jogador}}</td>
                <td>{{$jogador->posicao}}</td>
                <td>{{$jogador->numero}}</td>
                <td>{{$jogador->equipeAtual->nome_time}}</td>
                <td><a href="{{route('desconvoca', ['id' => $jogador->id])}}" class="btn btn-danger">Desconvocar</a></td>
            </tr>

            @endforeach
        </table>
        <br>
        <a href="{{url()->previous()}}" class="btn btn-default">Voltar</a>

    </div>
</body>
</html>
