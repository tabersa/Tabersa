<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


require 'API.php';
class SinkronController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index( Request $request)
    {
        if ($request->session()->exists('token')) {
            $token = $request->session()->get('token');
            $bank = getDataBank($token);
            $profile = getProfile($token);
            
            return view('page.sinkron.sinkronisasi', compact('bank','profile'));
        } else {
            Alert::error('Error Title', 'Error Message')->width('1000px');
            return redirect()->route('/');
        }
    }




}
