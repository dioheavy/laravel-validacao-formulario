@extends('layouts.principal')

@section('titulo', 'Clientes - Edit')

@section('conteudo')
    <h3>Editando Cliente</h3>

    <form action="{{ route('clientes.update', $cliente['id']) }}" method="POST">
        @csrf
        @method('PUT') <!-- o Laravel, força o formuláro a trabalhar com o metodo Put ao invés do Post, obs. formulário html só aceita get ou post-->
        <input type="text" name="nome" value="{{ $cliente['nome'] }}">
        <input type="submit" value="Salvar">
    </form>
@endsection