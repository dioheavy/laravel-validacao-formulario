<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteControlador extends Controller
{

    private $clientes = [
        ['id' => 1, 'nome' => 'ademir' ],
        ['id' => 2, 'nome' => 'joao' ],
        ['id' => 3, 'nome' => 'maria' ],
        ['id' => 4, 'nome' => 'aline' ]
    ];

    //Gravando os dados do array acima em sessão
    public function __construct(){
        $clientes = session('clientes');
        if(!isset($clientes))
        session(['clientes' => $this->clientes]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*echo '<ol>';
        foreach($this->clientes as $c){
            echo '<li>'.$c['nome'].'</li>';
        }
        echo '</ol>';*/
        //$clientes = $this->clientes;
        $clientes = session('clientes');        
        $titulo = "Todos os Clientes";
        return view('clientes.index', ['clientes'=> $clientes, 'titulo'=>$titulo]);
        //return view('clientes.index', compact(['clientes','titulo'])); //Obs. este é igual ao de cima, porém retorna um array comptactado

        //Outra forma de passar parametros
       /* return view('clientes.index')
        ->with('clientes',$clientes)
        ->with('titulo', $titulo);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // recebe os dados da sessão
        $clientes = session('clientes'); 
        $id = end($clientes)['id'] + 1;
        $nome = $request->nome;
        $dados = ['id'=>$id, 'nome'=>$nome];
        $clientes[] = $dados;
        session(['clientes' => $clientes]);        
        return redirect()->route('clientes.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Recupera os dadoso do cliente atraves do id, e exibe as informações em uma view
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes); 
        $cliente = $clientes[$index];
        return view('clientes.info', compact(['cliente'])); //obs. o compact passa o valor da variavel na rota
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes); 
        $cliente = $clientes[$index];
        return view('clientes.edit', compact(['cliente']));
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
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes); 
        $clientes[$index]['nome'] = $request->nome;
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);  
        array_splice($clientes, $index, 1); // Delesta apenas os dados retornados na variavel $index
        session(['clientes' => $clientes]); // cria uma nova sessão apenas com as informações que naõ foram apagadas
        return redirect()->route('clientes.index');
    }

    private function getIndex($id, $clientes){
        $ids = array_column($clientes, 'id'); // cria um array só com os IDS
        $index = array_search($id, $ids); // Busca o ID que é passado pela função
        return $index;  
    }
}
