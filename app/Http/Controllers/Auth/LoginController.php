<?php

namespace App\Http\Controllers\Auth;

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



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        $body = array(
            'username' => $request->username,
            'password' => $request->password,
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://147.139.130.151:8060/api/tokens',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($body),
        CURLOPT_HTTPHEADER => array(
                'tenant: 601687',
                'Content-Type: application/json',
                'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1laWRlbnRpZmllciI6IjExNDFhMTg4LTVhMDktMzExYi1iYmEyLTRhZDgzMTU2MDk1OCIsImh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3dzLzIwMDUvMDUvaWRlbnRpdHkvY2xhaW1zL2VtYWlsYWRkcmVzcyI6ImJwcmRlbW9AdGFiZXJzYS5pZCIsImZ1bGxOYW1lIjoiQlBSIFNBSEFCQVQgQU5BSyBORUdFUkkgIiwiaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvd3MvMjAwNS8wNS9pZGVudGl0eS9jbGFpbXMvbmFtZSI6IkJQUiBTQUhBQkFUIEFOQUsgTkVHRVJJIiwiaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvd3MvMjAwNS8wNS9pZGVudGl0eS9jbGFpbXMvc3VybmFtZSI6IiIsImlwQWRkcmVzcyI6IjE4MC4yNTIuMTcxLjIxIiwidGVuYW50IjoiNjAxNjg3IiwiZXhwIjoxNjcxNTQ5MzY5fQ._BXDryhH8yzofNhsSpcYw0Oyuo1KzzuQ8k7BcKgdFxg'
            ),
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        $data = json_decode($response);
    // dd($data);
        // dd($responseData);
        if ($httpcode == 200) {
            $token = $data->data->token;
            dd(Session::put('token', $token));
            if (Session::get('token') != null) {
                Alert::success('Success Title', 'Success Message');
                return redirect()->route('/dashboard');
            } else {
                Alert::error('Error Title', 'Error Message')->width('1000px');
                return redirect()->route('/');
            }
        } else {
            Alert::error('Error Title', 'Error Message')->width('1000px');
            return redirect()->route('/');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return view('login');
    }
}
