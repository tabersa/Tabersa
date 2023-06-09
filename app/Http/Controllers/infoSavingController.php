<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
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
            $saving = getSavingID($token, $id);
            // dd($saving);
            $bank = getDataBank($token);
            if ($saving->succeeded != false) {
                $datainfo = $saving->data;
                $datacif = $saving->data->cif;
                $dataproduct = $saving->data->savingProduct;
                // dd($datainfo);
                ////////////////
                if ($datainfo->status != "0") {
                    if($datainfo->status == "1"){
                    $curl = curl_init();
                    $api = config('properties.api');
                    curl_setopt_array(
                        $curl,
                        array(
                            CURLOPT_URL => $api.'v1/transaction/history/' . $datainfo->accountNumber,
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
                    // dd($transaksi);

                    curl_close($curl);

                    //////////////////////
                    $curl = curl_init();

                    curl_setopt_array(
                        $curl,
                        array(
                            CURLOPT_URL => $api.'v1/reference',
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
                        return view('page.tabungan.infotabungan', compact('bank', 'profile','trs', 'datainfo', 'datacif', 'dataproduct', 'dataakun'));
                    } else {
                        Alert::error('Error', 'Data Tabungan Ini Sudah Ditolak');
                        return redirect()->route('tabungan');
                    }
                } else {
                    // Alert::error('Account Number '.$datacif->fullName.' Kosong', 'Mohon Autorisasi Dahulu');
                    $datatipe = getSavingAccountType($token);
                    $datapurpose = getDataPurpose($token);

                    return view('page.tabungan.autorisasitabungan', compact('bank', 'profile', 'datainfo', 'datacif', 'dataproduct', 'datatipe', 'datapurpose'));

                }
            } else {
                $request->session()->forget('token');
                $request->session()->flush();
                return view('landing');
            }
        } else {
            Alert::error('Session Habis', 'Silahkan Login Kembali')->width('1000px');
            return redirect()->route('landing');
        }


    }
    public function autorisasi(Request $request, $id)
    {
        $token = $request->session()->get('token');

        list($new, $httpcode) = authSaving($request, $id);

        if ($new->succeeded === true) {
            Alert::success('Selamat', 'Data Telah di Autorisasi');
            return redirect()->route('tabungan');
        } else {
            Alert::error('Error', 'Periksa Kembali Data');
            return redirect()->route('tabungan');
        }
    }

    public function search(Request $request,$id)
    {
        // dd($request->all());
        $token = $request->session()->get('token');
        $datasearch = getTransaksiSearch($request);
        // dd($datasearch);
        $bank = getDataBank($token);
        $saving = getSavingID($token, $id);
        $datainfo = $saving->data;
        $datacif = $saving->data->cif;
        $dataproduct = $saving->data->savingProduct;
        $dataaddress = getCifID($token, $datacif->id);
        $address = $dataaddress[1];
        if (!empty($datasearch->data)) {
            return view('page.tabungan.printsearch', compact('datasearch','bank','datainfo', 'datacif', 'dataproduct','address'));
            
        } else {
            Alert::error('Error', 'Tidak Ada Transaksi Pada Waktu Ini');
            return redirect()->route('tabungan');
        }
    }

    public function printcard(Request $request){
        $token = $request->session()->get('token');
        $nama = $request->nama;
        $nomor = $request->nomor;
        $id = $request->id;
        
        $saving = getSavingID($token, $id);

        return view('page.tabungan.cardtest', compact('saving','id'));
    }
}