<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function index()
    {
        $response = Http::get('https://api.themoviedb.org/3/movie/550?api_key=APIKEY');
        return response()->json($response);
    }

    



}
