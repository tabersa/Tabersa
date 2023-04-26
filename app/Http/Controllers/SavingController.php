<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

require 'API.php';
class SavingController extends Controller
{
    
    public function index(Request $request)
    {
        if ($request->session()->exists('token')) {
            $token = $request->session()->get('token');

            $profile = getProfile($token);
            $datainfo = getSaving($token);
            $savingType = getSavingAccountType($token);
            $bank = getDataBank($token);
            if($profile === null) {
                return redirect()->route('landing');
            } else {
                return view('page.tabungan.tabungan', compact('savingType','bank','profile', 'datainfo'));
            }
        } else {
            Alert::error('Error Title', 'Error Message');
            return redirect()->route('/');
        }
    }


}