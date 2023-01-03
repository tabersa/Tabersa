<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class infoSavingController extends Controller
{
    public function index(Request $request, $id)
    {
        // dd($id);
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
            // dd($profile);
            $curl = curl_init();

            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_URL => 'http://147.139.130.151:8060/api/v1/saving/' . $id,
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

            $datasaving = curl_exec($curl);
            $saving = json_decode($datasaving);
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

                curl_setopt_array($curl, array(
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
                return view('page.tabungan.infotabungan', compact('profile', 'datainfo', 'datacif', 'dataproduct', 'trs', 'dataakun'));
            } else {
                Alert::error('Account Number Null', 'Account Number '.$datacif->fullName.' Kosong');
                return redirect()->route('tabungan');
                // return view('page.tabungan.infotabungan', compact('profile', 'datainfo', 'datacif', 'dataproduct'));
            }
        } else {
            Alert::error('Error Title', 'Error Message')->width('1000px');
            return redirect()->route('/');
        }
    }
}