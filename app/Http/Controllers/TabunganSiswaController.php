<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;


require 'API.php';
class TabunganSiswaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->exists('token')) {
            $token = Session::get('token');
            $profile = getProfile($token);
            $bank = getDataBank($token);

            return view('page.tabungansiswa', compact('profile', 'bank', ));
        } else {
            Alert::error('Error Title', 'Error Message')->width('1000px');
            $request->session()->forget('token');
            $request->session()->flush();
            return view('login');
        }

    }

    public function search(Request $request)
    {
        $token = Session::get('token');

        $profile = getProfile($token);
        $bank = getDataBank($token);
        $number = $request->number;

        $saving = getSavingID($token, $number);
        $datainfo = $saving->data;
        $cif = getCifID($token, $datainfo->cifId);


        // dd($saving);
        // dd(guidv4(openssl_random_pseudo_bytes(16)));

        return view('page.formtabungansiswa', compact('saving', 'bank', 'profile'));
    }

    public function store(Request $request)
    {
        $token = Session::get('token');

        $profile = getProfile($token);
        $bank = getDataBank($token);
        $number = $request->id;
        $saving = getSavingID($token, $number);

        $add = addTransaksi($request);

        // dd($add);
        if($add->succeeded == true){
            Alert::success('Berhasil!', 'Transaksi Berhasil Ditambahkan');
            return view('page.tabungansiswa',compact('saving', 'bank', 'profile'));
        } else {
            return redirect()->back();
        }
    }
}