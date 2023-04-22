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
        return view('page.user.user', compact('bank', 'profile'));
    }

}