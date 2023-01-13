<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Psr\Http\Message\ServerRequestInterface as Request1;
use Psr\Http\Message\ResponseInterface as Response;

use function App\Http\Controllers\getTokenData;
use function App\Http\Controllers\getTokens;

require "API.php";

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
    $this->validate($request, [
        'tenant' => 'required',
        'username' => 'required',
        'password' => 'required',
    ]);
    list($data, $httpcode) = getTokenData($request);
        $refresh = RefreshToken($data->data->token,$data->data->refreshToken );
    if ($httpcode == 200) {
        $token = $data->data->token;
        Session::put('token', $token);
        Session::put('tenant', $request->tenant);
        // $request->session()->put('token', $token);

        if ($request->session()->has('token')) {
            // dd($request->session());
            Alert::success('Selamat', 'Anda Berhasil Login');
            return redirect()->route('dashboard');
        } else {
            Alert::error('Error', 'Username atau Kata Sandi Anda Salah');
            return redirect()->route('back');
        }
    } else {
        Alert::error('Error', 'Periksa Kembali Data');
        return redirect()->route('back');
    }
    }

    public function out(Request $request)
    {
        $request->session()->forget('token');
        $request->session()->flush();
        return redirect()->route('/');
    }

    public function back()
    {
        return view('login');
        
    }
}