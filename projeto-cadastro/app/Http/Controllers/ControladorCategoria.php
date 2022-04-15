<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria; //Obs. é preciso incluir a Model responsavel que acionara a migration referente a esta model

class ControladorCategoria extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Categoria::all();
        return view('categorias' , compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novacategoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Categoria();
        $cat->nome = $request->input('nomeCategoria');
        $cat->save();
        return redirect('/categorias');
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
        $cat = Categoria::find($id); // a variavel $cat vai receber o conteudo retornado pelo metodo find()
        if(isset($cat)){ //verifica se existe o conteúdo com o metodo isset()
            return view('editarcategoria', compact('cat')); // retorna para a view editarcategoria.blade.php o objeto cat
        }
        return redirect('/categorias');
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
        $cat = Categoria::find($id); // a variavel $cat vai receber o conteudo retornado pelo metodo find()
        if(isset($cat)){ //verifica se existe o conteúdo com o metodo isset()
            $cat->nome = $request->input('nomeCategoria'); // A variavel vai resgatar o valor do campo do formulário
            $cat->save(); // Salva o conteúdo
        }
        return redirect('/categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Categoria::find($id); // a variavel $cat vai receber o conteudo retornado pelo metodo find()
        if (isset($cat)){ //verifica se existe o conteúdo com o metodo isset()
            $cat->delete(); // se existir, ou seja se estiver setado, deleta
        }
        return redirect('/categorias');
    }
}
