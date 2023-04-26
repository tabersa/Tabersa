<?php

namespace App\Http\Controllers;

use CURLFile;
use DateTime;
use GuzzleHttp\Client;
use GuzzleHttp\Utils;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

//////////////////////////////////////////////////////////////////////////////////////////////// ////////////////////////////////////////////////////////////////////////////////////////////////////
// DATA TOKEN
function getSidebar()
{
    $sidebar = json_decode(file_get_contents(public_path() . "/assets/menu.json"), true);
    return $sidebar;
}

function getTokenData(Request $request)
{
    $body = array(
        'tenant' => $request->tenant,
        'username' => $request->username,
        'password' => $request->password,
    );
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'tokens',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => array(
                'tenant: root',
                'Content-Type: application/json',
                'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1laWRlbnRpZmllciI6IjExNDFhMTg4LTVhMDktMzExYi1iYmEyLTRhZDgzMTU2MDk1OCIsImh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3dzLzIwMDUvMDUvaWRlbnRpdHkvY2xhaW1zL2VtYWlsYWRkcmVzcyI6ImJwcmRlbW9AdGFiZXJzYS5pZCIsImZ1bGxOYW1lIjoiQlBSIFNBSEFCQVQgQU5BSyBORUdFUkkgIiwiaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvd3MvMjAwNS8wNS9pZGVudGl0eS9jbGFpbXMvbmFtZSI6IkJQUiBTQUhBQkFUIEFOQUsgTkVHRVJJIiwiaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvd3MvMjAwNS8wNS9pZGVudGl0eS9jbGFpbXMvc3VybmFtZSI6IiIsImlwQWRkcmVzcyI6IjE4MC4yNTIuMTcxLjIxIiwidGVuYW50IjoiNjAxNjg3IiwiZXhwIjoxNjcxNTQ5MzY5fQ._BXDryhH8yzofNhsSpcYw0Oyuo1KzzuQ8k7BcKgdFxg'
            ),
        )
    );
    $response = curl_exec($curl);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    $data = json_decode($response);
    // dd($data);
    return array($data, $httpcode);
}
function refreshToken($token, $refresh)
{
    $api = config('properties.api');
    $tenant = Session::get('tenant');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'tokens/refresh',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
            "token": "' . $token . '",
            "refreshToken": "' . $refresh . '"
}',
            CURLOPT_HTTPHEADER => array(
                'tenant: ' . $tenant,
                'Content-Type: application/json',
                'Authorization: Bearer ' . $token,
            ),
        )
    );
    $response = curl_exec($curl);
    $refreshData = json_decode($response);
    curl_close($curl);
    return $refreshData;

}

//////////////////////////////////////////////////////////////////////////////////////////////// ////////////////////////////////////////////////////////////////////////////////////////////////////
// DATA CIF
function getCIf($token)
{
    $api = config('properties.api');
    $tenant = Session::get('tenant');
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
                'tenant: ' . $tenant,
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
    $dataPhoto = $cif->data->cifPhoto;
    $dataid = $id;
    // dd($datainfo);
    curl_close($curl);
    return array($datainfo, $dataaddress, $dataoccupation, $dataspouse, $dataid, $dataPhoto);
}

function authCIf($request, $id)
{
    $token = $request->session()->get('token');
    if (isset($_POST['verif']) === "verif") {
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
    // dd($new);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    return array($new, $httpcode);
}

function getSpecificCIF($token, $id)
{
    $api = config('properties.api');
    // dapetin username header
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
  "keyword": "' . $id . '",
  "pageNumber": 0,
  "pageSize": 100,
  "orderBy": [
    "CreatedOn DESC"
  ],
  "cifId": "",
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
    $data = json_decode($response);
    $dataspesifik = $data->data[0];
    // dd($dataspesifik);
    curl_close($curl);
    return $dataspesifik;

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
            CURLOPT_POSTFIELDS => config('properties.savingbody'),
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
        $status = $request->status;
    } else {
        $auth = 2;
        $status = $request->status;
    }
    // dd($request->status);
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

function getSavingByID($token, $id)
{
    $api = config('properties.api');
    // dapetin username header
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/saving/bycif/' . $id,
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

    $response = curl_exec($curl);
    $dataID = json_decode($response);
    curl_close($curl);
    return $dataID;

}
//////////////////////////////////////////////////////////////////////////////////////////////// ////////////////////////////////////////////////////////////////////////////////////////////////////
// DATA TRANSAKSI
function guidv4($data)
{
    assert(strlen($data) == 16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

function addTransaksi($request)
{
    $token = $request->session()->get('token');
    $api = config('properties.api');

    $id = $request->id;
    $saving = getSavingID($token, $id);
    $nama = $request->nama;
    $cifid = $saving->data->cifId;
    $deskripsi = $request->keterangan;
    $nominal = doubleval($request->nominal);
    $rekening = $saving->data->accountNumber;

    $body = array(
        $id = $request->id,
        $saving = getSavingID($token, $id),
        $nama = $request->nama,
        $cifid = $saving->data->cifId,
        $deskripsi = $request->keterangan,
        $nominal = doubleval($request->nominal),
        $rekening = $saving->data->accountNumber,
    );

    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/transaction',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "id": "' . guidv4(openssl_random_pseudo_bytes(16)) . '",
                "cifId": "' . $cifid . '",
                "transactionDate": "' . date('Y-m-d') . 'T00:00:00' . '",
                "transactionGroup": "10",
                "invoiceNumber": "' . generateRandomString(10) . '",
                "description": "' . $deskripsi . '",
                "totalAmount": "' . $nominal . '",
                "dc": "C",
                "auth": "0",
                "status": "0",
                "transactionDetail": [
                    {
                        "transactionId": "' . guidv4(openssl_random_pseudo_bytes(16)) . '",
                        "billerCode": "LCL_TO_LCL",
                        "account": "CASH",
                        "description": "Setoran Kolektif",
                        "amount": "' . $nominal . '",
                        "dc": "D",
                        "transaction": {
                            "value": "' . $nominal . '"
                                        }
                    },
                    {
                        "transactionId": "' . guidv4(openssl_random_pseudo_bytes(16)) . '",
                        "billerCode": "LCL_TO_LCL",
                        "account": "' . $rekening . '",
                        "description": "' . $nama . '",
                        "amount": "' . $nominal . '",
                        "dc": "C",
                        "transaction": {
                            "value": "' . $nominal . '"
                                        }
                    }
                    ]
                }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $token,
            ),
        )
    );
    $tran = curl_exec($curl);
    curl_close($curl);

    $transaksi = json_decode($tran);
    // dd($transaksi);
    return $transaksi;

}

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
              "pageSize": 100,
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

function lastOfMonth($year, $month)
{
    return date("Y-m-d", strtotime('-1 second', strtotime('+1 month', strtotime($month . '/01/' . $year . ' 00:00:00'))));
}

function getTransaksiSearch($request)
{
    $token = $request->session()->get('token');
    $ts = strtotime($request->tahun . " " . $request->bulan);
    $last = lastOfMonth($request->tahun, $request->bulan);
    // dd($last);
    // $last = date('t', $ts);
    $body = array(
        "accountNumber" => $request->accountNumber,
        "startDate" => $request->tahun . "-" . $request->bulan . "-01",
        "endDate" => $last,
        "transactionGroup" => ""
    );
    $api = config('properties.api');

    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/transaction/history-group-by-date',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $token,
                'Content-Type: application/json'
            ),
        )
    );
    $response = curl_exec($curl);
    $datasearch = json_decode($response);
    // dd($datasearch);
    curl_close($curl);
    // dd($body);
    return $datasearch;
}


function authTransaksi($token, $id)
{
    if (isset($_POST['verif']) === 'terima') {
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
// DATA SETTINGS
function getDataBank($token)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'identity/bank',
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
    $dataBank = json_decode($response);
    return $dataBank;

}

//////////////////////////////////////////////////////////////////////////////////////////////// ////////////////////////////////////////////////////////////////////////////////////////////////////
// DATA NEWS

function getNews($token)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/news/search',
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
      ""
    ],
    "keyword": ""
  },
  "keyword": "",
  "pageNumber": 0,
  "pageSize": 0,
  "orderBy": [
    "publishedOn DESC"
  ],
  "headline": "",
  "text": ""
}',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $token,
                'Content-Type: application/json'
            ),
        )
    );

    $response = curl_exec($curl);
    $dataNews = json_decode($response);
    curl_close($curl);
    return $dataNews;

}

function getFeaturedNews($token)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/news/featured',
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
    $dataFeatured = json_decode($response);
    curl_close($curl);
    return $dataFeatured;

}

function getDetailNews($token, $id)
{
    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/news/' . $id,
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
    $detail = json_decode($response);
    curl_close($curl);
    return $detail;

}

function updateNews(Request $request)
{
    $token = $request->session()->get('token');
    $api = config('properties.api');
    $author = $request->pembuat;
    $id = $request->id;
    $waktu = date('Y-m-d\TH:i:s.000') . 'Z';
    $headline = $request->headline;
    $textawal = $request->text;
    $text = str_replace("\"", "'", $textawal);
    // dd($text);
    $file = $request->file('file');

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $photo = $request->file('file')->getClientOriginalName();
        $destination = base_path() . '/public/uploads';
        $request->file('file')->move($destination, $photo);
        $filepath = public_path("uploads/" . $photo);

        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $api . 'v1/reference/upload-file/news',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => false,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('file' => new CURLFILE($filepath)),

                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer ' . $token,
                ),
            )
        );

        $response = curl_exec($curl);
        curl_close($curl);
        $fileimage = json_decode($response);
        // dd($fileimage);
        $link = $fileimage->data;
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $api . 'v1/news/' . $id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'PUT',
                CURLOPT_POSTFIELDS => '{
                "headline": "' . $request->headline . '",
                "text":  "' . $text . '",
                "publishedBy":  "' . (string) $author . '",
                "publishedOn":  "' . (string) $waktu . '",
                "imageUrl":  "' . (string) $link . '",
                "status": 0
            }',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer ' . $token,
                    'Content-Type: application/json'
                ),
            )
        );

        $response = curl_exec($curl);
        $dataUpdate = json_decode($response);
        // dd($dataUpdate);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        return array($dataUpdate, $httpcode);
    } else {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $api . 'v1/news/' . $id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'PUT',
                CURLOPT_POSTFIELDS => '{
                "headline": "' . $request->headline . '",
                "text":  "' . $text . '",
                "publishedBy":  "' . (string) $author . '",
                "publishedOn":  "' . (string) $waktu . '",
                "imageUrl":  "",
                "status": 0
            }',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer ' . $token,
                    'Content-Type: application/json'
                ),
            )
        );

        $response = curl_exec($curl);
        $dataUpdate = json_decode($response);
        // dd($dataUpdate);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        return array($dataUpdate, $httpcode);
    }

}

function addNews(Request $request)
{
    $token = $request->session()->get('token');
    $author = $request->pembuat;
    $id = $request->id;
    $waktu = date('Y-m-d\TH:i:s.000') . 'Z';
    // $waktu = date(DATE_ISO8601);
    $headline = $request->headline;
    $textawal = $request->text;
    $text = str_replace("\"", "'", $textawal);
    $file = $request->file('file');
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $photo = $request->file('file')->getClientOriginalName();
        $destination = base_path() . '/public/uploads';
        $request->file('file')->move($destination, $photo);

    }
    $filepath = public_path("uploads/" . $photo);

    $api = config('properties.api');
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/reference/upload-file/news',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('file' => new CURLFILE($filepath)),

            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $token,
            ),
        )
    );

    $response = curl_exec($curl);
    curl_close($curl);
    $fileimage = json_decode($response);
    // dd($fileimage);
    $link = $fileimage->data;

    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'v1/news',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
            "headline": "' . $request->headline . '",
            "text":  "' . $text . '",
            "publishedBy":  "' . (string) $author . '",
            "publishedOn":  "' . (string) $waktu . '",
            "imageUrl":  "' . (string) $link . '"
}',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $token,
                'Content-Type: application/json'
            ),
        )
    );
    // 2023-01-11T06:12:38.580Z 
    // "publishedOn":  "' .date("Y-m-d").'.T'.date("H:i:s").'.672Z",
    $response = curl_exec($curl);
    $dataAdd = json_decode($response);
    // dd($dataAdd);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    return array($dataAdd, $httpcode);

}


//////////////////////////////////////////////////////////////////////////////////////////////// ////////////////////////////////////////////////////////////////////////////////////////////////////
// DATA REFERENCE



function getResidensialStatus($token)
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
  "referenceTable": "RefResidensialStatus",
  "referenceCode": ""
}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $token
            ),
        )
    );

    $response = curl_exec($curl);
    $residensial = json_decode($response);
    curl_close($curl);
    return $residensial;

}

function getIdentityType($token)
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
  "referenceTable": "RefIdentity",
  "referenceCode": ""
}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $token
            ),
        )
    );

    $response = curl_exec($curl);
    $type = json_decode($response);
    curl_close($curl);
    return $type;
}

function getRandomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}
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

function registUser(Request $request, $token)
{
    $api = config('properties.api');
    $curl = curl_init();

    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $api . 'identity/register',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "firstName": "' . $request->firstname . '",
                "lastName": "' . $request->lastname . '",
                "email": "' . $request->email . '",
                "userName": "' . $request->username . '",
                "password": "' . $request->password . '",
                "confirmPassword": "' . $request->confirmpasword . '",
                "phoneNumber": "' . $request->phonenumber . '",
                "userType": "' . $request->usertype . '"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $token
            ),
        )
    );

    $response = curl_exec($curl);
    $dataregis = json_decode($response);
    // dd($dataregis);
    curl_close($curl);
    return $dataregis;

}

function getAllMenu(){
    $api = config('properties.api');
    $token = session()->get('token');
    $curl = curl_init();
    
    curl_setopt_array($curl, [
        CURLOPT_URL => $api . 'v1/appadmin/get-all-menu',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer ' . $token
        ],
    ]);
    
    $response = curl_exec($curl);
    $menu = json_decode($response);
    curl_close($curl);
    return $menu;
}