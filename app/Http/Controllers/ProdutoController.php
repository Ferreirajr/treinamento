<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prod = Produto::with('categorias')->get();

        //$prod = Produto::with('categoria')->get();
        return view('produtos.index', compact('prod'));
        //return json_decode($prod);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categoria::get();

        return view('produtos.cadastro', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $request->all();
        $cat = $form['categorias'];
        dd($cat);
        $prod = Produto::create([
            'nome' => $form['nome'],
            'valor' => $form['valor']
        ]);

        $produto = Produto::find($prod->id);

        $produto->categorias()->attach($cat);

        return redirect()->route('produtos.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $categorias = Categoria::get();
            $produto = Produto::find($id);
            return view('produtos.atualizar', compact('produto','categorias'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$produto = Produto::find($id))
            return redirect()->route('produtos.index');

        $produto->delete();
        return redirect()
                        ->route('produtos.index')
                        ->with('message','Deletado com Sucesso!');
        //
    }
}
