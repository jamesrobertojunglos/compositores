<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partitura;
use Session;

class PartiturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $partituras = Partitura::paginate(5);
       return view('partitura.index',array('partituras'=>$partituras,'busca'=>null));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar(Request $request) {
        $partituras = Partitura::where('compositor','LIKE','%'.$request->input('busca').'%')->paginate(5); 
        return view('compositor.index',array('Partituras' => $partituras, 'busca'=>$request->input('busca')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partituras.create');
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
            'compositor' => 'required|min:3',
            'partitura' => 'required',
        ]);
        $partitura = new Partitura();
        $partitura->compositor = $request->input('compositor');
        $partitura->partitura = $request->input('partitura');
        if($partitura->save()) {
            if($request->hasFile('foto')){
                $imagem = $request->file('foto');
                $nomearquivo = md5($partitura->id).".".$imagem->getClientOriginalExtension();
                //dd($imagem, $nomearquivo,$partitura->id);
                $request->file('foto')->move(public_path('.\img\partituras'),$nomearquivo);
            }
            Session::flash('mensagem','Partitura incluida com sucesso');
            return redirect('partituras');
        }

    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function schow(id)
    {
        $partitura = Partitura::find($id);
        return view('partitura.show',array('partitura' => $partitura));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partitura = Partitura::find($id);
        return view('partitura.edit',array('partitura' => $partitura));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partitura $id)
    {
        $this->validate($request,[
            'compositor' => 'required|min:3',
            'partitura' => 'required',
        ]);
        $partitura = new Partitura();
        $partitura->compositor = $request->input('compositor');
        $partitura->partitura = $request->input('partitura');
        if($partitura->save()) {
            if($request->hasFile('foto')){
                $imagem = $request->file('foto');
                $nomearquivo = md5($partitura->id).".".$imagem->getClientOriginalExtension();
                //dd($imagem, $nomearquivo,$partitura->id);
                $request->file('foto')->move(public_path('.\img\partituras'),$nomearquivo);
            }
            Session::flash('mensagem','Partitura editada com sucesso');
            return redirect()->back();
        }

    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $partitura = Partitura::find($id);
        if (isset($request->foto)) {
         unlink($request->foto);
        }
        $partitura->delete();
        Session::flash('mensagem','Partitura Excluida com Sucesso');
        return redirect(url('partituras/'));
    }
}
