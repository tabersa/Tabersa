<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

require 'API.php';
class NewsController extends Controller
{
    public function index(Request $request){
        $token = $request->session()->get('token');
        $profile = getProfile($token);
        $dataNews = getNews($token);
        $dataFeatured = getFeaturedNews($token);
        $bank = getDataBank($token);
        return view('page.news.news',compact('bank','profile','dataNews','dataFeatured'));
    }

    public function show(Request $request,$id){
        $token = $request->session()->get('token');
        $profile = getProfile($token);
        $detail = getDetailNews($token, $id);
        $dataNews = getNews($token);
        $bank = getDataBank($token);
        return view('page.news.detailNews', compact('bank','profile', 'detail','dataNews'));
    }

    public function input(Request $request){
        $token = $request->session()->get('token');
        $profile = getProfile($token);
        $bank = getDataBank($token);
        // dd($profile->data->firstName . $profile->data->lastName);
        return view('page.news.addNews', compact('bank','profile'));
    }

    public function add(Request $request){
        $token = $request->session()->get('token');
        $profile = getProfile($token);
        list($dataAdd, $httpcode) = addNews($request);
        $bank = getDataBank($token);

        
        return view('page.news.addNews', compact('bank','profile','dataAdd','httpcode'));

        // if ($httpcode == 200) {
        //     Alert::success('Selamat', 'Data Telah di Tambahkan');
        //     return redirect()->route('news');
        // }  else {
        //     Alert::error('Error', 'Periksa Kembali Data');
        //     return redirect()->route('transaksi');
        // }
    }
}
