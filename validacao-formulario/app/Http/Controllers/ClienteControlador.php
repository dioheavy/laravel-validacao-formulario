<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente; //inclui a Model Cliente.php
class ClienteControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all(); //Acessa a Model Cliente, recuperar todos os dados para retornar na view 'clientes'
        return view('clientes', compact('clientes')); // retorna a view cliente passando a variavel 'clientes' compactada
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novocliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
         ** O script abaixo faz a validação dos campos do formulário atraves do name='' do input, para que não aceite valores nullos
         ** E também grave as informações na variavel $errors para que possa ser utilizada como validação dos campos
         ** Outro motivo é não exibir erro do laravel na pagina quando um campo não for preenchido
         ** uma forma de verificar os erros retornando é usar um var_dump($errors) na pagina do formulário
         ** Na validação é possivel acrescentar mais validações incluindo a barra pipe | 
         ** ex: 'require|min:5' quer dizer que é requirido e o minimo de caracteres aceito são 5
         ** Obs. a validação unique:clientes, quer dizer que esse dado só pode nao pode ser repetido na tabela Clientes 
         ** Sobre a customização das mensagens: basta colocar o name do input mais a regra ex: nome.required quer dize que
         ** o campo é o input name='nome' ele é requerido, e se não for preenchido, sera exibido a mensagem de aviso
         ** Obs. na mensagem ainda é possivel colocar uma mensagem generica quando mais de um campo utiliza a mesma validação
         ** exemplo o required pode ser usar apenas o required como validação e na mensagem enviar o :attribute que vai exibir
         ** o nome do campo na mensagem
         */

        $mensagens = [
            'required' => 'O campo :attribute não pode estar vazio',
            'nome.required' => 'O campo nome não pode estar vazio!',
            'email.email'=> 'Digite um endereço de email valido!'
        ]; 
        $request->validate([
            'nome'      => 'required|min:5|max:10',
            'idade'     => 'required',
            'endereco'  => 'required|min:5',
            'email'     => 'required|email|unique:clientes' 
        ], $mensagens);

        //Este metodo, recebe as informações do formulario, e salva na tabela Cliente
        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->endereco = $request->input('endereco');
        $cliente->idade = $request->input('idade');
        $cliente->email = $request->input('email');
        $cliente->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
