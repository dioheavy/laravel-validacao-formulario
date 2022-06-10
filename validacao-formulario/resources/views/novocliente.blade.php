<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
    <style>
        body{padding: 20px;}
    </style>
</head>
<body>

    <main role="main">
        <div class="row">
            <div class="container col-md-8 offset-md-2">
                <div class="card border">
                    <div class="card-header">
                        <div class="card-title">Cadastro de Cliente</div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/cliente" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nome">Nome do Cliente</label>
                            <input type="text" id="nome" 
                            class="form-control {{$errors->has('nome') ? 'is-invalid' : ''}}" 
                            name="nome" placeholder="Nome do Cliente">

                            {{-- Verificação pra exibir mensagem de erro --}}
                            @if ($errors->has('nome'))
                                <div class="invalid-feedback">
                                    {{$errors->first('nome')}}
                                </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="idade">Idade do Cliente</label>
                            <input type="number" id="idade" class="form-control" name="idade" placeholder="Idade do Cliente">
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço do Cliente</label>
                            <input type="text" id="endereco" class="form-control" name="endereco" placeholder="Endereço do Cliente">
                        </div>
                        <div class="form-group">
                            <label for="email">Email do Cliente</label>
                            <input type="text" id="email" class="form-control" name="email" placeholder="Email do Cliente">
                        </div>
                        <button type="submit" class="btn-primary btn-sm">Salvar</button>
                        <button type="cancel" class="btn-primary btn-sm">Cancelar</button>
                    </form>
                </div>
            </div>            
        </div>
        {{-- O script abaixo verifica se a variavel $errors possui algum valor, e exibe o alerta--}}
        @if ($errors->any())
            <div class="card-footer">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                @endforeach
            </div>
        @endif
    </main>
    @if( isset($errors) )
        {{var_dump($errors)}}
    @endif
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
</body>
</html>