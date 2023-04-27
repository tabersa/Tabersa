<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

require "API.php";

class UserController extends Controller
{

    public function index(Request $request)
    {
        $token = $request->session()->get('token');
        $profile = getProfile($token);
        $transaksi = getTransaksi($token);
        $bank = getDataBank($token);
        $menu = getAllMenu();
        $datamenu = $menu->data;
        return view('page.user.user', compact('bank', 'profile', 'datamenu'));
    }

    public function register(Request $request)
    {
        $token = $request->session()->get('token');
        $profile = getProfile($token);
        $bank = getDataBank($token);
        
        $menu = getAllMenu();
        $datamenu = $menu->data;
        $regis = registUser($request, $token);
        $user = getUser();
        $userName = $request->username;
        for ($i = 0; $i < count($user->data); $i++) {
            $datausername[] = $user->data[$i]->userName;
            if($datausername[$i] == $userName){
                $datauser = $user->data[$i];
                $dataUserID = $user->data[$i]->id;
                // dd($dataUserID);
                
                if(isset($request->datasubmenu)){
                    $dataid = $request->dataid;
                    $value = array_merge($dataid,$request->datasubmenu);
                }
                else{
                    $value = $request->dataid;
                }
                $tambahmenu = createMenuUser($datauser->id,substr(json_encode($value), 1, -1));
            }
        }

            
            // GET MENU BERDASARKAN ID REQUEST
            
        // for ($a = 0; $a < count($request->dataid); $a++) {
        //     $valueid[] = $request->dataid[$a];
        //     for ($i = 0; $i < count($datamenu); $i++) {
        //         $datamenuid[] = $menu->data[$i]->id;
        //         if($request->dataid[$a] == $menu->data[$i]->id){
            //             $value[] = $menu->data[$i];
        //         }
        //     }
        // }

        // dd($datauser->id);
        
        if ($regis->succeeded == "true" && $tambahmenu->succeeded == "true") {
            Alert::success('Selamat', 'Data User Berhasil Disimpan');
            return view('page.user.user', compact('bank', 'profile', 'datamenu'));
        } else {
            Alert::error('Error', 'Periksa Kembali Data Anda');
            return redirect()->route('user');
        }
    }

    public function showactive(Request $request){
        $token = $request->session()->get('token');
        $profile = getProfile($token);
        $bank = getDataBank($token);
        $datauser = getUser();
        $user = $datauser->data;
        return view('page.user.activeuser', compact('bank', 'profile','user'));
        
    }

    public function changeactive(Request $request){
        $token = $request->session()->get('token');
        $profile = getProfile($token);
        $bank = getDataBank($token);
        $change = changeActive($request);
        $datauser = getUser();
        $user = $datauser->data;

        if ($change->succeeded == "true") {
            Alert::success('Selamat', 'Data User Berhasil Dirubah');
            return view('page.user.activeuser', compact('bank', 'profile', 'user'));
        } else {
            Alert::error('Error', 'Periksa Kembali Data Anda');
            return redirect()->route('user.showactive');
        }
    }
}