<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class infoTransaksiController extends Controller
{
    public function index(Request $request, $id)
    {
        if ($request->session()->exists('token')) {
            $token = $request->session()->get('token');

            // dapetin username header
            $curl = curl_init();
            curl_setopt_array(
                $curl,
                array(
                CURLOPT_URL => 'http://147.139.130.151:8060/api/identity/profile',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                        'Authorization: Bearer ' . $token
                    ),
                )
            );
            $response = curl_exec($curl);
            $profile = json_decode($response);

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://147.139.130.151:8060/api/v1/transaction/'.$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $token
            ),
            )
            );
            $datatransaksi = curl_exec($curl);
            $transaksi = json_decode($datatransaksi);
            $datainfo = $transaksi->data;
            $datadetail = $transaksi->data->transactionDetail;
            curl_close($curl);

            // dd($datainfo);
            // curl_close($curl);

            $curl = curl_init();



            // dd($cif);
            return view('page.transaksi.infotransaksi', compact('profile', 'datainfo', 'datadetail', ));
        } else {
            Alert::error('Error Title', 'Error Message')->width('1000px');
            return redirect()->route('/');
        }
    }
}