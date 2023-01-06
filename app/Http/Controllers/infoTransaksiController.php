<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_URL => 'http://147.139.130.151:8060/api/v1/transaction/' . $id,
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

            $curl = curl_init();
            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_URL => 'http://147.139.130.151:8060/api/v1/cif/' . $transaksi->data->cifId,
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
            // dd($datacif);
            curl_close($curl);

            // dd($cif);
            return view('page.transaksi.infotransaksi', compact('profile', 'datainfo', 'datadetail', 'datacif'));
        } else {
            Alert::error('Error Title', 'Error Message')->width('1000px');
            return redirect()->route('/');
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
            "id" => $id,
            "auth" => $auth,
            "status" => $status,
        );

        $curl = curl_init();

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'http://147.139.130.151:8060/api/v1/transaction/auth/' . $id,
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
        if ($httpcode == 200) {
            Alert::success('Selamat', 'Data Telah di Autorisasi');
            return redirect()->route('transaksi');
        } else if ($httpcode == 406) {
            Alert::success('Selamat', 'Data Telah di Autorisasi');
            return redirect()->route('transaksi');
        } else {
            Alert::error('Error', 'Periksa Kembali Data');
            return redirect()->route('transaksi');
        }
        curl_close($curl);

    }

    public function cetak(Request $request, $id)
    {
        $token = $request->session()->get('token');
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'http://147.139.130.151:8060/api/v1/transaction/' . $id,
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

        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'http://147.139.130.151:8060/api/v1/cif/' . $transaksi->data->cifId,
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
        // dd($datacif);
        curl_close($curl);
        return view('page.transaksi.printtransaksi', compact('datainfo', 'datadetail', 'datacif'));
    }

    public function export(Request $request, $id)
    {
        $token = $request->session()->get('token');
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'http://147.139.130.151:8060/api/v1/transaction/' . $id,
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

        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'http://147.139.130.151:8060/api/v1/cif/' . $transaksi->data->cifId,
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
        // dd($datacif);
        curl_close($curl);
        //mengambil data dan tampilan dari halaman laporan_pdf
        //data di bawah ini bisa kalian ganti nantinya dengan data dari database
        $data = Pdf::loadview('page.transaksi.printtransaksi', compact('datainfo', 'datadetail', 'datacif') );
        // ['datainfo'=> $datainfo, 'datadetail'=> $datadetail, 'datacif'=>$datacif]
        //mendownload laporan.pdf
        return $data->download('laporan.pdf');
    }
}