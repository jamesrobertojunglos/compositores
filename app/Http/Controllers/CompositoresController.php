<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compositor;
use Session;

class CompositoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compositores = Compositor::all();
        return view('compositor.index',array('compositores' => $compositores, 'busca'=>null));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('compositor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request,[
            'nome' => 'required|min:3]',
            'ano' => 'required|',
            'origem' => 'required|',
            'resumo' => 'required|',
            'obras'  => 'required|',
        ]);
        $compositor = new Compositor();
        $compositor->nome = $request->input('nome');
        $compositor->ano = $request->input('ano');
        $compositor->origem = $request->input('origem');
        $compositor->resumo = $request->input('resumo');
        $compositor->obras = $request->input('obras');
        if($compositor->save()) {
            Session::flash('mensagem','Compositor incluido com sucesso');
            return redirect('compositores');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compositor = Compositor::find($id);
        return view('compositor.show',array('compositor' => $compositor));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compositor = Compositor::find($id);
        return view('compositor.edit',array('compositor' => $compositor));
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
        $this->validate($request,[
            'nome' => 'required|min:3]',
            'ano' => 'required|',
            'origem' => 'required|',
            'resumo' => 'required|',
            'obras'  => 'required|',
        ]);
        $compositor = Compositor::find($id);
        $compositor->nome = $request->input('nome');
        $compositor->ano = $request->input('ano');
        $compositor->origem = $request->input('origem');
        $compositor->resumo = $request->input('resumo');
        $compositor->obras = $request->input('obras');
        if($compositor->save()) {
            Session::flash('mensagem','Compositor editado com sucesso');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $compositor = Compositor::find($id);
       $compositor->delete();
       Session::flash('mensagem','Compositor Excluido com Sucesso');
       return redirect(url('compositores/'));
    }
}
