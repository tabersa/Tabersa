<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

require "API.php";

class infoTransaksiController extends Controller
{
    public function index(Request $request, $id)
    {
        if ($request->session()->exists('token')) {
            $token = $request->session()->get('token');
            $bank = getDataBank($token);
            $profile = getProfile($token);
            list($transaksi,$datainfo, $datadetail) = getDataTransaksi($token, $id);
            $datacif = getTransaksiCif($token, $transaksi->data->cifId);

            return view('page.transaksi.infotransaksi', compact('bank','profile', 'datainfo', 'datadetail', 'datacif'));
        } else {
            Alert::error('Error Title', 'Error Message')->width('1000px');
            return redirect()->route('/');
        }
    }

    public function autorisasi(Request $request, $id)
    {
        $token = $request->session()->get('token');
        list($new, $httpcode) = authTransaksi($token, $id);
        if ($new->succeeded === true) {
            Alert::success('Selamat', 'Data Telah di Autorisasi');
            return redirect()->route('transaksi');
        } else {
            Alert::error('Error', 'Periksa Kembali Data');
            return redirect()->route('transaksi');
        }
        // curl_close($curl);
        // else if ($httpcode == 406) {
        //     Alert::success('Selamat', 'Data Telah di Autorisasi');
        //     return redirect()->route('transaksi');
        // }
    }

    public function cetak(Request $request, $id)
    {
        $token = $request->session()->get('token');
        list($transaksi,$datainfo, $datadetail) = getDataTransaksi($token, $id);
        $datacif = getTransaksiCif($token, $transaksi->data->cifId);
        return view('page.transaksi.printtransaksi', compact('datainfo', 'datadetail', 'datacif'));
    }

}