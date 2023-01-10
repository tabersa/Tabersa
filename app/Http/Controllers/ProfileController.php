<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    public function index()
    {
        $api = config('properties.api');
        $response = Http::get($api.'identity/profile');
        $data = $response->json();
        // dd($data);
        return view('index', compact('data'));
    }

}