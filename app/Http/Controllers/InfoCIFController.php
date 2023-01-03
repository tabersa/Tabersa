<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class infoCIFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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

            // dapetin data cif
            $curl = curl_init();
            curl_setopt_array(
                $curl,
                array(
                CURLOPT_URL => 'http://147.139.130.151:8060/api/v1/cif/' . $id,
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

            $datacif = curl_exec($curl);

            $cif = json_decode($datacif);
            $datainfo = $cif->data->cif;
            $dataaddress = $cif->data->cifAddress;
            $dataoccupation = $cif->data->cifOccupation;
            $dataspouse = $cif->data->cifSpouse;
            // dd($datainfo);
            curl_close($curl);


            //////////////////////////////////////////////////
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
                    "referenceTable": "RefCity",
                    "referenceCode": ""
                        }',
                CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json',
                        'Authorization: Bearer ' . $token,
                    ),
                )
            );
            $responsecity = curl_exec($curl);
            $datacity = json_decode($responsecity);
            $city = $datacity->data;
            // dd($city);
            curl_close($curl);
            ///////////////////////////////////////////////////////////
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
        "referenceTable": "RefProvince",
        "referenceCode": ""
            }',
                CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json',
                        'Authorization: Bearer ' . $token,
                    ),
                )
            );
            $responseprovince = curl_exec($curl);
            $dataprovince = json_decode($responseprovince);
            $province = $dataprovince->data;
            // dd($city);
            curl_close($curl);
            //////////////////////////////////////////////
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
        "referenceTable": "RefNationality",
        "referenceCode": ""
            }',
                CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json',
                        'Authorization: Bearer ' . $token,
                    ),
                )
            );
            $responsenationality = curl_exec($curl);
            $datanationality = json_decode($responsenationality);
            $national = $datanationality->data;
            // dd($city);
            curl_close($curl);
            ////////////////////////////////////
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
        "referenceTable": "RefEducation",
        "referenceCode": ""
            }',
                CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json',
                        'Authorization: Bearer ' . $token,
                    ),
                )
            );
            $responseedu = curl_exec($curl);
            $dataedu = json_decode($responseedu);
            $edu = $dataedu->data;
            // dd($city);
            curl_close($curl);
            ///////////////////////////////////////////////////
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
        "referenceTable": "RefOccupation",
        "referenceCode": ""
            }',
                CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json',
                        'Authorization: Bearer ' . $token,
                    ),
                )
            );
            $responseoccupation = curl_exec($curl);
            $datajob = json_decode($responseoccupation);
            $job = $datajob->data;
            // dd($city);
            curl_close($curl);
            ///////////////////////////////////////////////////
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
        "referenceTable": "RefSectorOfIndustry",
        "referenceCode": ""
            }',
                CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json',
                        'Authorization: Bearer ' . $token,
                    ),
                )
            );
            $responsesector = curl_exec($curl);
            $datasector = json_decode($responsesector);
            $sector = $datasector->data;
            // dd($city);
            curl_close($curl);
            ///////////////////////////////////////////////////
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
        "referenceTable": "RefMonthlyIncome",
        "referenceCode": ""
            }',
                CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json',
                        'Authorization: Bearer ' . $token,
                    ),
                )
            );
            $responsegaji = curl_exec($curl);
            $datagaji = json_decode($responsegaji);
            $gaji = $datagaji->data;
            // dd($city);
            curl_close($curl);
            ///////////////////////////////////////////////////
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
        "referenceTable": "RefMonthlySpending",
        "referenceCode": ""
            }',
                CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json',
                        'Authorization: Bearer ' . $token,
                    ),
                )
            );
            $responsepengeluaran = curl_exec($curl);
            $datapengeluaran = json_decode($responsepengeluaran);
            $pengeluaran = $datapengeluaran->data;
            // dd($city);
            curl_close($curl);
            ///////////////////////////////////////////////////
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
        "referenceTable": "RefSourceOfFund",
        "referenceCode": ""
            }',
                CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json',
                        'Authorization: Bearer ' . $token,
                    ),
                )
            );
            $responsedari = curl_exec($curl);
            $datadari = json_decode($responsedari);
            $dari = $datadari->data;
            // dd($city);
            curl_close($curl);
            ///////////////////////////////////////////////////
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
        "referenceTable": "RefJobPosition",
        "referenceCode": ""
            }',
                CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json',
                        'Authorization: Bearer ' . $token,
                    ),
                )
            );
            $responsejabatan = curl_exec($curl);
            $datajabatan = json_decode($responsejabatan);
            $jabatan = $datajabatan->data;
            // dd($city);
            curl_close($curl);
             ///////////////////////////////////////////////////
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
         "referenceTable": "RefMaritalStatus",
         "referenceCode": ""
             }',
                 CURLOPT_HTTPHEADER => array(
                         'Content-Type: application/json',
                         'Authorization: Bearer ' . $token,
                     ),
                 )
             );
             $responsekawin = curl_exec($curl);
             $datakawin = json_decode($responsekawin);
             $kawin = $datakawin->data;
             // dd($city);
             curl_close($curl);

            // dd($cif);
            return view(
                'page.cif.infocif',
                compact(
                    'profile',
                    'datainfo',
                    'dataaddress',
                    'dataoccupation',
                    'dataspouse',
                    'city',
                    'province',
                    'national',
                    'edu',
                    'job',
                    'sector',
                    'gaji',
                    'pengeluaran',
                    'dari',
                    'jabatan',
                    'kawin',

                )
            );
        } else {
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