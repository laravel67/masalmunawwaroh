<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminInformasiController extends Controller
{

    public function arsip(){
        view()->share('title', 'Kelalo Arsip Dokument');
        return  view('dashboard.Informasi.arsip');
    }
}
