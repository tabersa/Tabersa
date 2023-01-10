<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//////////////////////////////////////////////////////////////////////////////////////////////// ////////////////////////////////////////////////////////////////////////////////////////////////////
// DATA CIF
function getCIf($token)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/cif/search',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => config('properties.cifbody'),
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
    return $cif;
}
function getCifSearch($token, $id)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/cif/search',
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
  "keyword":  "' . $id . '",
  "pageNumber": 0,
  "pageSize": 100,
  "orderBy": [
    "CreatedOn DESC"
  ],
  "cifId": null,
  "transactionDateFrom": "",
  "transactionDateTo": "",
  "status": 1000
}',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $token,
                'Content-Type: application/json'
            ),
        )
    );

    $response = curl_exec($curl);
    $new = json_decode($response);
    $newdata = $new->data[0];
    curl_close($curl);
    return $newdata;
}

function getCifID($token, $id)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/cif/' . $id,
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
    $dataid = $id;
    // dd($datainfo);
    curl_close($curl);
    return array($datainfo, $dataaddress, $dataoccupation, $dataspouse, $dataid);
}

function authCIf($request, $id)
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
        "cifNumber" => (string) $request->cifNumber,
        "auth" => $auth,
        "status" => $status,
    );
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/cif/auth/' . $id,
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
    return array($new, $httpcode);
}

//////////////////////////////////////////////////////////////////////////////////////////////// ////////////////////////////////////////////////////////////////////////////////////////////////////
// DATA SAVING
function getSaving($token)
{
    $api = config('properties.api');
    // dapetin username header
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/saving/search',
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
"branchId": "001",
"accountNumber": "",
"savingAccountType": "",
"savingProductId": "8cbf60d6-ea1c-4fbc-bde5-0449d183bf02"
}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $token
            ),
        )
    );

    $response = curl_exec($curl);
    $hsl = json_decode($response);
    $datainfo = $hsl->data;
    curl_close($curl);
    return $datainfo;
}

function getSavingID($token, $id)
{
    $api = config('properties.api');
    // dapetin username header
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/saving/' . $id,
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
    return $saving;
}

function authSaving($request, $id)
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
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/saving/auth/' . $id,
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
    return array($new, $httpcode);
}
//////////////////////////////////////////////////////////////////////////////////////////////// ////////////////////////////////////////////////////////////////////////////////////////////////////
// DATA TRANSAKSI

function getTransaksi($token)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/transaction/search',
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
                'Authorization: Bearer ' . $token
            ),
        )
    );

    $tran = curl_exec($curl);
    curl_close($curl);
    $transaksi = json_decode($tran);
    return $transaksi;
}

function getTransaksiID($token, $key)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/cif/' . $key,
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
    $transaksicif = json_decode($response);
    $datacif = $transaksicif->data->cif;
    curl_close($curl);
    return $datacif;
}

function getDataTransaksi($token, $id)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/transaction/' . $id,
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
    return array($transaksi, $datainfo, $datadetail);
}

function getTransaksiCif($token, $transaksi)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/cif/' . $transaksi,
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
    $transaksicif = json_decode($response);
    $datacif = $transaksicif->data->cif;
    curl_close($curl);
    return $datacif;
}

function authTransaksi($token,$id)
{
    if (isset($_POST['verif'])) {
        $auth = 1;
        $status = 1;
    } else {
        $auth = 2;
        $status = 2;
    }
    $body = array(
        "id" => $id,
        "auth" => $auth,
        "status" => $status,
    );
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/transaction/auth/' . $id,
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
    return array($new, $httpcode);
}

//////////////////////////////////////////////////////////////////////////////////////////////// ////////////////////////////////////////////////////////////////////////////////////////////////////
// DATA REFERENCE
function getProfile($token)
{
    $api = config('properties.api');
    // dapetin username header
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'identity/profile',
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
    curl_close($curl);
    $profile = json_decode($response);
    return $profile;
}

function getRefCity($token)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/reference',
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
    curl_close($curl);
    return $city;
}

function getRefProvince($token)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/reference',
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
    curl_close($curl);
    return $province;
}

function getRefNationality($token)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/reference',
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
    curl_close($curl);
    return $national;
}
function getRefEducation($token)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/reference',
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
    return $edu;
}
function getRefOcupation($token)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/reference',
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
    return $job;
}
function getRefSector($token)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/reference',
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
    return $sector;
}
function getRefIncome($token)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/reference',
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
    return $gaji;
}
function getRefSpending($token)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/reference',
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
    return $pengeluaran;
}
function getRefSourceFund($token)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/reference',
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
    return $dari;
}
function getRefJobPosition($token)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/reference',
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
    return $jabatan;
}
function getRefMarital($token)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/reference',
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
    curl_close($curl);
    return $kawin;
}

function getSavingAccountType($token)
{
    $api = config('properties.api');
    // dapetin username header
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/reference',
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
    return $datatipe;
}

function getDataPurpose($token)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/reference',
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
    curl_close($curl);
    return $datapurpose;
}