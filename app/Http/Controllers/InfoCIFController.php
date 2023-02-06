<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

require 'API.php';

class InfoCIFController extends Controller
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
            $bank = getDataBank($token);
            $profile = getProfile($token);
            $newdata = getCifSearch($token, $id);
            $dataspesifik = getSpecificCIF($token, $id);
            list($datainfo, $dataaddress, $dataoccupation, $dataspouse, $dataid, $dataPhoto) = getCifID($token,$id);
            $type = getIdentityType($token);
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
            $residensial = getResidensialStatus($token);
            
            

            if($profile === null) {
                return redirect()->route('landing');
            } else {
                return view(
                    'page.cif.infocif',
                    compact(
                        'dataspesifik',
                        'dataPhoto',
                        'residensial',
                        'bank',
                        'dataid',
                        'profile',
                        'newdata',
                        'datainfo',
                        'dataaddress',
                        'dataoccupation',
                        'dataspouse',
                        'city',
                        'type',
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

    public function tabungan(Request $request,$id){
        $token = $request->session()->get('token');
        $bank = getDataBank($token);
        $profile = getProfile($token);
        $dataspesifik = getSpecificCIF($token, $id);
        $savingType = getSavingAccountType($token);
        $dataID = getSavingByID($token, $id);
        return view('page.cif.tabungancif', compact('savingType','bank','profile', 'dataspesifik','dataID'));
    }

    public function deposito(Request $request,$id){
        $token = $request->session()->get('token');
        $bank = getDataBank($token);
        $profile = getProfile($token);
        $dataspesifik = getSpecificCIF($token, $id);
        $dataID = getSavingByID($token, $id);
        return view('page.cif.deposito', compact('dataspesifik','bank','profile','dataID'));
    }

    public function kredit(Request $request,$id){
        $token = $request->session()->get('token');
        $bank = getDataBank($token);
        $profile = getProfile($token);
        $dataspesifik = getSpecificCIF($token, $id);
        $dataID = getSavingByID($token, $id);
        return view('page.cif.kredit', compact('dataspesifik','bank','profile','dataID'));
    }
    public function autorisasi(Request $request, $id)
    {
        list($new, $httpcode) = authCif($request, $id);
        if ($new->succeeded === true) {
            Alert::success('Selamat', 'Data Telah di Autorisasi');
            return redirect()->route('cif');
        } else {
            Alert::error('Error', 'Periksa Kembali Data');
            return redirect()->route('cif');
        }
    }
}