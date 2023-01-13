<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

require 'API.php';
class DashboardController extends Controller
{
    
    public function Profile(Request $request)
    {
        if ($request->session()->exists('token')) {
            $token = Session::get('token');
            
            $profile = getProfile($token);
            $bank = getDataBank($token);

            return view('page.dashboard', compact('profile','bank'));
        } else {
            Alert::error('Error Title', 'Error Message')->width('1000px');
            $request->session()->forget('token');
            $request->session()->flush();
            return view('login');
        }
    }


}