<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComicsController extends Controller
{
       public function index() {
         // prodotti
    $comics = config('product-data');
    // dump($comics);
    // pagina
    return view('comics', compact('comics'));
    }
}