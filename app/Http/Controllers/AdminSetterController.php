<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSetterController extends Controller
{
    public function setDaftar()
    {
        view()->share('title', 'Pengaturan Pendaftaran');
        return view('dashboard.settings.setting-register');
    }
}
