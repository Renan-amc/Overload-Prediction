<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class HomeController extends Controller
{
    public function index(){
        $produtos = Produto::all();
        //dd($produtos);
        return view('home.index', ['produtos'=>$produtos]);
    }
} 
