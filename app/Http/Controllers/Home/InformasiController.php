<?php 

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Arsip;

class InformasiController extends Controller
{
    public function arsips(){
        view()->share('title', 'Arsip ');
        $arsips=Arsip::latest()->paginate(10);
        return view('home.informasi.arsip', compact('arsips'));
    }

    public function kontak(){
        view()->share('title', 'Kontak Kami');
        return view('home.informasi.kontak');
    }

    public function agenda(){
        view()->share('title', 'Agenda dan Acara');
        return view('home.informasi.agenda');
    }
}