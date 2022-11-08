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
        return view('compositor.index',array('compositores' => $compositores));
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
        $compositor = new Compositor();
        $compositor->nome = $request->input('nome');
        $compositor->ano = $request->input('ano');
        $compositor->origem = $request->input('origem');
        $compositor->resumo = $request->input('resumo');
        $compositor->obras = $request->input('obras');
        if($compositor->save()) {
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
