<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" >

    <title>Cadastro de Produtos</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body{
            padding: 20px;
        }
        .navbar{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        @component('componente_navebar', ["current" => $current])
        @endcomponent

        <main role="main">
            @hasSection('body') <!-- Verifica se existe uma sessao body-->
                @yield('body')  <!-- Exibe a sessao -->
            @endif
        </main>   
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>