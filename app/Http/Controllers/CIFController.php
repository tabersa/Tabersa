<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;


require 'API.php';

class CIFController extends Controller
{

    public function index(Request $request)
    {
        
        $api = config('properties.api');
        if (Session::has('token')) {
            $dataprofile = new ProfileController();
            $token = $request->session()->get('token');
            $bank = getDataBank($token);
            $profile = getProfile($token);
            $cif = getCIF($token);
            
            
            if($profile === null) {
                return redirect()->route('landing'); } else {
                return view('page.cif.cif', compact('profile', 'cif','bank'));
            }
        } else {
            Alert::error('Error Title', 'Error Message')->width('1000px');
            return redirect()->route('/');
        }
    }


    

}