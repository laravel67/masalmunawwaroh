<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminMasterdataController extends Controller
{
    public function jabatan()
    {
        view()->share('title', 'Data Jabatan');
        return view('dashboard.masterdata.jabatan');
    }

    public function mapel()
    {
        view()->share('title', 'Kelola Mata Pelajaran');
        return view('dashboard.mapel');
    }
}
