@extends('layouts.app', ["current" => "categorias"])

@section('body')

<h4>Cadastro de categorias</h4>

<div class="card border">
    <div class="card-body">
        <form action="/categorias" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomeCategorias">Nome da Categoria</label>
                <input type="text" class="form-control" name="nomeCategoria" id="nomeCategoria" placeholder="Categoria">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancel</button>
        </form>
    </div>
</div>

@endsection 