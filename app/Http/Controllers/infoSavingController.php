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

            // dd($saving);
            
            
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
                return view('page.tabungan.infotabungan', compact('profile', 'datainfo', 'datacif', 'dataproduct', 'trs', 'dataakun'));
            } else {
                // Alert::error('Account Number '.$datacif->fullName.' Kosong', 'Mohon Autorisasi Dahulu');
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
                            'Authorization: Bearer ' . $token
                        ),
                    )
                );
                $response = curl_exec($curl);
                $datatipe = json_decode($response);
                curl_close($curl);


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
                            "referenceTable": "RefPurposeOfAccount",
                            "referenceCode": ""
                        }',
                        CURLOPT_HTTPHEADER => array(
                            'Content-Type: application/json',
                            'Authorization: Bearer ' . $token
                        ),
                    )
                );
                $response = curl_exec($curl);
                $datapurpose = json_decode($response);
                // dd($datainfo);
                curl_close($curl);
                return view('page.tabungan.autorisasitabungan', compact('profile', 'datainfo', 'datacif', 'dataproduct', 'datatipe', 'datapurpose'));

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

        if (isset($_POST['verif'])) {
            $auth = 1;
            $status = 1;
        } else {
            $auth = 2;
            $status = 2;
        }
        $body = array(
            "branchId" => $request->branchId,
            "cifNumber" => $request->cifNumber,
            "accountNumber" => (string) $request->accountNumber,
            "virtualAccountNumber" => (string) $request->virtualAccountNumber,
            "auth" => $auth,
            "status" => $status,
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://147.139.130.151:8060/api/v1/saving/auth/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $token
            ),
        )
        );
        $response = curl_exec($curl);
        $new = json_decode($response);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpcode == 200) {
            Alert::success('Selamat', 'Data Telah di Autorisasi');
            return redirect()->route('tabungan');
        } else {
            Alert::error('Error', 'Periksa Kembali Data');
            return redirect()->route('tabungan');
        }
    }
}