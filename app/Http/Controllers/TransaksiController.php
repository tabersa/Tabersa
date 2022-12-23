<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if ($request->session()->exists('token')) {
            $token = $request->session()->get('token');
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

            // batas

            $curl = curl_init();
            curl_setopt_array(
                $curl,
                array(
                CURLOPT_URL => 'http://147.139.130.151:8060/api/v1/transaction/search',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
              "advancedSearch": {
                "fields": [
                ],
                "keyword": ""
              },
              "keyword": "",
              "pageNumber": 0,
              "pageSize": 10,
              "orderBy": [
                "transactionDate DESC"
              ],
              "cifId": null,
              "transactionDateFrom": "2022-01-01",
              "transactionDateTo": "2022-12-31",
              "status": 1000
            }',
                CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json',
                        'Authorization: Bearer '. $token 
                    ),
                )
            );

            $tran = curl_exec($curl);
            curl_close($curl);
            $transaksi = json_decode($tran);

            // dd($profile);

            return view('page.transaksi.transaksi', compact('profile','transaksi'));
        } else {
            Alert::error('Error Title', 'Error Message')->width('1000px');
            return redirect()->route('/');
        }
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}