<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

require "API.php";

class UserController extends Controller
{

    public function index(Request $request)
    {
        $token = $request->session()->get('token');
        $profile = getProfile($token);
        $transaksi = getTransaksi($token);
        $bank = getDataBank($token);
        $menu = getAllMenu();
        $datamenu = $menu->data;
        return view('page.user.user', compact('bank', 'profile','datamenu'));

    }

    public function register(Request $request){
        $token = $request->session()->get('token');
        $regis = registUser($request,$token);
        // dd($request->all());
        if($regis->succeeded == "true"){
            Alert::success('Selamat', 'Data User Berhasil Disimpan');
            return redirect()->route('user');
        }
        else{
            Alert::error('Error', 'Periksa Kembali Data Anda');
            return redirect()->route('user');
        }
    }
}