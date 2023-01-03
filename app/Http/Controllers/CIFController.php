<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class CIFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if (Session::has('token')) {
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

            // dapetin data cif
            $curl = curl_init();
            curl_setopt_array(
                $curl,
                array(
                CURLOPT_URL => 'http://147.139.130.151:8060/api/v1/cif/search',
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
  "pageSize": 100,
  "orderBy": [
    "CreatedOn DESC"
  ],
  "cifId": "d7430000-9de4-507b-d350-08da3ea69a34",
  "transactionDateFrom": "2022-01-01",
  "transactionDateTo": "2022-10-27",
  "status": 1000
}',
                CURLOPT_HTTPHEADER => array(
                        'tenant: 601687',
                        'Authorization: Bearer ' . $token,
                        'Content-Type: application/json'
                    ),
                )
            );

            $datacif = curl_exec($curl);
            curl_close($curl);
            $cif = json_decode($datacif);

            // dd($cif->data);
            return view('page.cif.cif', compact('profile', 'cif'));
        } 
        else {
            Alert::error('Error Title', 'Error Message')->width('1000px');
            return redirect()->route('/');
        }
    }


    public function Profile()
    {
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
    public function show(Request $request, $id)
    {
        // dd($id);
        $token = $request->session()->get('token');
        $curl = curl_init();

        curl_setopt_array(
            $curl,
            array(
            CURLOPT_URL => 'http://147.139.130.151:8060/api/v1/cif/e1be0000-3e01-0016-7d38-08dac21dec99',
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

        $datainfo = curl_exec($curl);
        return view('page.cif.infocif', compact('datainfo'));
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