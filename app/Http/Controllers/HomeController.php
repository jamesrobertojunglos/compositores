<?php

namespace App\Http\Controllers;


use App\Models\Compositor;
use App\Models\Partitura;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // Passar quantidades de Dados - para criar um DashBoard
        $numCompositores = Compositor::all()->count();
        $numPartituras = Partitura::all()->count();
       // $numEmprestimos = Emprestimo::all()->count();
       //$emprestimosadevolver = Emprestimo::where('datadevolucao','=',NULL)->get();
        //return view('home',array('numLivros'=>$numLivros,'numContatos'=>$numContatos,'numEmprestimos'=>$numEmprestimos,'emprestimosadevolver'=>$emprestimosadevolver));
    }
}