<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

require 'API.php';

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

            $profile = getProfile($token);
            $newdata = getCifSearch($token, $id);
            list($datainfo, $dataaddress, $dataoccupation, $dataspouse, $dataid) = getCifID($token,$id);
            $city = getRefCity($token);
            $province = getRefProvince($token);
            $national = getRefNationality($token);
            $edu = getRefEducation($token);
            $job = getRefOcupation($token);
            $sector = getRefSector($token);
            $gaji = getRefIncome($token);
            $pengeluaran = getRefSpending($token);
            $dari = getRefSourceFund($token);
            $jabatan = getRefJobPosition($token);
            $kawin = getRefMarital($token);
            

            if($profile === null) {
                return redirect()->route('landing');
            } else {
                return view(
                    'page.cif.infocif',
                    compact(
                        'dataid',
                        'profile',
                        'newdata',
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
            }
        } else {
            Alert::error('Error Title', 'Error Message')->width('1000px');
            return redirect()->route('/');
        }
    }


    public function autorisasi(Request $request, $id)
    {
        
        list($new, $httpcode) = authCif($request, $id);
        if ($httpcode == 200) {
            Alert::success('Selamat', 'Data Telah di Autorisasi');
            return redirect()->route('cif');
        } else {
            Alert::error('Error', 'Periksa Kembali Data');
            return redirect()->route('cif');
        }
    }
}