<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;


require 'API.php';
class TabunganSiswaController extends Controller
{
    public function index(Request $request){
        if ($request->session()->exists('token')) {
            $token = Session::get('token');
            $profile = getProfile($token);
            $bank = getDataBank($token);

            return view('page.tabungansiswa',compact('profile', 'bank',));
        } else {
            Alert::error('Error Title', 'Error Message')->width('1000px');
            $request->session()->forget('token');
            $request->session()->flush();
            return view('login');
        }

    }

    public function search(Request $request){
        $token = Session::get('token');
        
        $profile = getProfile($token);
        $bank = getDataBank($token);
        $number = $request->number;

        $saving = getSavingID($token, $number);
        $datainfo = $saving->data;

        // dd($datainfo);

        return view('page.formtabungansiswa', compact('saving','bank','profile'));
    }
}
