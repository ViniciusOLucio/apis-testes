<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{
    public function index()
    {
        $data = Http::get('https://mdn.github.io/learning-area/javascript/oojs/json/superheroes.json')
        ->json();

        return view('welcome', compact('data'));
    }
}
