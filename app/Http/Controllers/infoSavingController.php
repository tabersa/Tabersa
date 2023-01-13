<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

require 'API.php';

class infoSavingController extends Controller
{
    public function index(Request $request, $id)
    {
        // dd($id);
        if ($request->session()->exists('token')) {
            $token = $request->session()->get('token');
            $profile = getProfile($token);
            $saving = getSavingID($token,$id);
            $bank = getDataBank($token);
            if ($saving->succeeded != false) {
            $datainfo = $saving->data;
            $datacif = $saving->data->cif;
            $dataproduct = $saving->data->savingProduct;

            ////////////////
            if ($datainfo->accountNumber != null) {
                $curl = curl_init();
                curl_setopt_array(
                    $curl,
                    array(
                        CURLOPT_URL => 'http://147.139.130.151:8060/api/v1/transaction/history/' . $datainfo->accountNumber,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'GET',
                        CURLOPT_HTTPHEADER => array(
                            'Authorization: Bearer ' . $token,
                        ),
                    )
                );

                $datatransaksi = curl_exec($curl);
                $transaksi = json_decode($datatransaksi);
                $trs = $transaksi->data;

                curl_close($curl);

                //////////////////////
                $curl = curl_init();

                curl_setopt_array(
                    $curl,
                    array(
                        CURLOPT_URL => 'http://147.139.130.151:8060/api/v1/reference',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => '{
                    "referenceTable": "RefSavingAccountType",
                    "referenceCode": ""
                    }',
                        CURLOPT_HTTPHEADER => array(
                            'Content-Type: application/json',
                            'Authorization: Bearer ' . $token,
                        ),
                    )
                );

                $response = curl_exec($curl);
                $dataakun = json_decode($response);
                // dd($cif);
                return view('page.tabungan.infotabungan', compact('bank','profile', 'datainfo', 'datacif', 'dataproduct', 'trs', 'dataakun'));
            } else {
                // Alert::error('Account Number '.$datacif->fullName.' Kosong', 'Mohon Autorisasi Dahulu');
                    $datatipe = getSavingAccountType($token);
                    $datapurpose = getDataPurpose($token);

                return view('page.tabungan.autorisasitabungan', compact('bank','profile', 'datainfo', 'datacif', 'dataproduct', 'datatipe', 'datapurpose'));

            }
        } else {
        $request->session()->forget('token');
        $request->session()->flush();
        return view('landing'); }
        } else {
            Alert::error('Session Habis', 'Silahkan Login Kembali')->width('1000px');
            return redirect()->route('landing');
        }
            
            
    }
    public function autorisasi(Request $request, $id)
    {
        $token = $request->session()->get('token');
        
        list($new, $httpcode) = authSaving($request, $id);
        
        if ($httpcode == 200) {
            Alert::success('Selamat', 'Data Telah di Autorisasi');
            return redirect()->route('tabungan');
        } else {
            Alert::error('Error', 'Periksa Kembali Data');
            return redirect()->route('tabungan');
        }
    }
}