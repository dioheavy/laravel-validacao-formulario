@extends('layouts.principal')
@section('titulo', 'Opcoes')

@section('conteudo')
<div class="options">
    <ul>
        <li><a class="warning {{ Request::is('opcoes/1') ? 'selected' : '' }}"  href="{{route('opcoes', 1)}}">Warning</a></li>
        <li><a class="info {{ Request::is('opcoes/2') ? 'selected' : '' }}"     href="{{route('opcoes', 2)}}">Info</a></li>
        <li><a class="success {{ Request::is('opcoes/3') ? 'selected' : '' }}"  href="{{route('opcoes', 3)}}">Success</a></li>
        <li><a class="error {{ Request::is('opcoes/4') ? 'selected' : '' }}"    href="{{route('opcoes', 4)}}">Error</a></li>
    </ul>
</div>


    @if(isset($opcao))
        @switch($opcao)
            @case(1)
                @component('components.alerta', ['titulo'=>'Erro Fatal', 'tipo'=>'warning'])
                    <p><strong>Warning</strong></p>
                    <p>Ocorreu um erro Inesperado</p>
                @endcomponent              
                @break
            @case(2) 
                @component('components.alerta', ['titulo'=>'Erro Fatal', 'tipo'=>'info'])
                    <p><strong>Info</strong></p>
                    <p>Ocorreu um erro Inesperado</p>
                @endcomponent               
                @break
            @case(3)
                @component('components.alerta', ['titulo'=>'Erro Fatal', 'tipo'=>'success'])
                    <p><strong>Success</strong></p>
                    <p>Ocorreu um erro Inesperado</p>
                @endcomponent                
                @break
            @case(4)  
                @component('components.alerta', ['titulo'=>'Erro Fatal', 'tipo'=>'error'])
                    <p><strong>Error</strong></p>
                    <p>Ocorreu um erro Inesperado</p>
                @endcomponent               
                @break            
                
        @endswitch
    @endif

@endsection