<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminKesiswaanController extends Controller
{
    public function album()
    {
        view()->share('title', 'Album Foto dan Video');
        return view('dashboard.kesiswaan.galeri');
    }

    public function ekskul()
    {
        view()->share('title', 'Ekstrakulikuler');
        return view('dashboard.kesiswaan.ekskul');
    }

    public function bem()
    {
        view()->share('title', 'Organisasi Siswa');
        return view('dashboard.kesiswaan.bem');
    }
}
