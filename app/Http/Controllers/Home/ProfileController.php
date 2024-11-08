<?php

namespace App\Http\Controllers\Home;

use App\Models\Bidang;
use App\Models\Sambutan;
use App\Models\Struktur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Jabatan;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function identitas()
    {
        view()->share('title', 'Identitas');
        return view('home.profile.identitas');
    }

    // public function struktur()
    // {
    //     view()->share('title', 'Struktur Organisasi');
    //     $yayasan = Jabatan::where('name', 'YAYASAN')->first();
    //     $pimpinan = Jabatan::where('name', 'PIMPINAN')->first();
    //     $kabagTu = Jabatan::where('name', 'KABAG TU')->first();
    //     $bendahara = Jabatan::where('name', 'BENDAHARA')->first();
    //     $pengasuhPutra = Jabatan::where('name', 'PENGASUH SANTRI PUTRA')->first();
    //     $pengasuhPutri = Jabatan::where('name', 'PENGASUH SANTRI PUTRI')->first();
    //     $kamadMas = Jabatan::where('name', 'KAMAD MAS')->first();
    //     $kamadMts = Jabatan::where('name', 'KAMAD MTS')->first();
    //     $bidPendidikan = Jabatan::where('name', 'BID PENDIDIKAN')->first();
    //     $bidPrasarana = Jabatan::where('name', 'BID PRASARANA')->first();
    //     $bidKesiswaan = Jabatan::where('name', 'BID KESISWAAN')->first();
    //     $bidKesehatan = Jabatan::where('name', 'BID KESEHATAN')->first();
    //     $teachers = Guru::all();

    //     return view('home.profile.struktur', compact(
    //         'yayasan',
    //         'pimpinan',
    //         'kabagTu',
    //         'bendahara',
    //         'pengasuhPutra',
    //         'pengasuhPutri',
    //         'kamadMas',
    //         'kamadMts',
    //         'bidPendidikan',
    //         'bidPrasarana',
    //         'bidKesiswaan',
    //         'bidKesehatan',
    //         'teachers'
    //     ));
    // }

    public function struktur(){
        view()->share('title', 'Struktur Organisasi');
        $struktur = Struktur::latest()->first();
        return view('home.profile.struktur', compact('struktur'));
    }

    public function sejarah()
    {
        view()->share('title', 'Sejarah');
        return view('home.profile.sejarah');
    }

    public function visi()
    {
        view()->share('title', 'Visi, Misi dan Motto');
        $visimisi = Profile::latest()->first();
        return view('home.profile.visi-misi',compact('visimisi'));
    }

    public function sambutan()
    {
        view()->share('title', 'Sambutan Kepala Madrasah');
        $sambutan = Profile::latest()->first();
        return view('home.profile.sambutan',compact('sambutan'));
    }
}
