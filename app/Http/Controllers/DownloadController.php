<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DownloadController extends Controller
{
    public function getDownload(){

        $file = public_path()."/download/tes.pdf";
        $headers = array('Content-Type: application/pdf',);
        return Response::download($file, 'tes.pdf',$headers);
    }
}
