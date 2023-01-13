<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

require 'API.php';

class TransaksiController extends Controller
{

    public function index(Request $request)
    {
        if ($request->session()->exists('token')) {
            $token = $request->session()->get('token');
            $profile = getProfile($token);
            $transaksi = getTransaksi($token);
            $bank = getDataBank($token);
            foreach ($transaksi->data as $key) {
                $datacif = getTransaksiID($token, $key->cifId);
            }

            return view('page.transaksi.transaksi', compact('bank','profile', 'transaksi','datacif'));
        } else {
            Alert::error('Error Title', 'Error Message')->width('1000px');
            return redirect()->route('/');
        }
    }

}