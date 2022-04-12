@extends('layouts.principal')
@section('titulo', 'Departamentos')
@section('conteudo')

    <h3>Departamentos</h3>
    <ul>
        <li>Computadores</li>
        <li>Eletronicos</li>
        <li>Acessórios</li>
        <li>Roupas</li>
    </ul>
    <!--
    Obs. foi criado um component na pasta Providers
    em AppServiceProvider.php para chamar o componente alerta de outra forma apenas no primeiro exemplo
    -->
    
    @alerta(['titulo'=>'Erro Fatal', 'tipo'=>'info'])
        <p><strong>Erro Inesperado</strong></p>
        <p>Ocorreu um erro Inesperado</p>
    @endalerta

    @component('components.alerta', ['titulo'=>'Erro Fatal', 'tipo'=>'error'])
        <p><strong>Erro Inesperado</strong></p>
        <p>Ocorreu um erro Inesperado</p>
    @endcomponent

    @component('components.alerta', ['titulo'=>'Erro Fatal', 'tipo'=>'success'])
        <p><strong>Erro Inesperado</strong></p>
        <p>Ocorreu um erro Inesperado</p>
    @endcomponent

    @component('components.alerta', ['titulo'=>'Erro Fatal', 'tipo'=>'warning'])
        <p><strong>Erro Inesperado</strong></p>
        <p>Ocorreu um erro Inesperado</p>
    @endcomponent

@endsection 