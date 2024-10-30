<?php

namespace App\Http\Controllers;

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;


class SobreNosController extends Controller
{
    public function sobreNos()
    {
        return view('site.sobre-nos');
    }
}
