<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        return view('home.index');
    }

    public function indexIngressos(): View
    {
        return view('comprarIngressos.ingressos');
    }
}
