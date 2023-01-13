<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

require 'API.php';
class SettingController extends Controller
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
            $profile = getProfile($token);
            $bank = getDataBank($token);
            
            return view('page.setting.setting', compact('bank','profile'));
        } else {
            Alert::error('Error Title', 'Error Message')->width('1000px');
            return redirect()->route('/');
        }
    }

    public function profile(Request $request){
        $token = $request->session()->get('token');
        $profile = getProfile($token);
        $dataBank = getDataBank($token);
        $bank = getDataBank($token);
        $city = getRefCity($token);
        $province = getRefProvince($token);
        return view('page.setting.settingProfile',compact('bank','profile','dataBank','city','province'));
    }

    public function literasi(Request $request){
        $token = $request->session()->get('token');
        $profile = getProfile($token);
        $bank = getDataBank($token);
        return view('page.setting.settingLiterasi',compact('bank','profile'));
    }

    public function tabungan(Request $request){
        $token = $request->session()->get('token');
        $profile = getProfile($token);
        $bank = getDataBank($token);
        return view('page.setting.settingTabungan',compact('bank','profile'));
    }

}
