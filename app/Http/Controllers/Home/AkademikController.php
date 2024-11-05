<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Achievment;
use App\Models\Guru;
use App\Models\Program;
use App\Models\Sarana;
use App\Models\Taj;
use Illuminate\Http\Request;

class AkademikController extends Controller
{
    public function kurikulum()
    {
        view()->share('title', 'Kurikulum');
        return view('home.akademik.kurikulum');
    }

    public function sarana()
    {
        view()->share('title', 'Sarana Prasarana');
        $saranas = Sarana::orderBy('id', 'desc')->get();
        return view('home.akademik.sarana-prasarana', [
            'saranas' => $saranas
        ]);
    }

    public function saranaDetail($slug) {
        $sarana = Sarana::where('slug', $slug)->firstOrFail();
        view()->share('title', $sarana->name);
        
        return view('home.akademik.detail-sarana', ['sarana' => $sarana]);
    }    

    public function biografi()
    {
        view()->share('title', 'Biografi Tenaga Pengajar');
        $gurus = Guru::orderBy('id', 'desc')->get();
        return view('home.akademik.biografi', [
            'gurus' => $gurus
        ]);
    }

    public function guruDetail($slug) {
        $guru = Guru::where('slug', $slug)->firstOrFail();
        view()->share('title', 'Biografi');
        return view('home.akademik.detail-biografi', ['guru' => $guru]);
    }  

    public function programUnggulan(){
        view()->share('title', 'Program Unggulan');
        $programs=Program::latest()->get();
        return view('home.akademik.program', compact('programs'));
    }

    public function prestasi(){
        view()->share('title', 'Daftar Prestasi');
        $prestasi=Achievment::latest()->get();
        return view('home.akademik.prestasi', compact('prestasi'));
    }
    public function prestasiDetail($slug){
        $prestasi = Achievment::where('slug', $slug)->firstOrFail();
        view()->share('title', 'Prestasi '.$prestasi->category);
        return view('home.akademik.prestasi-detail', compact('prestasi'));
    }

    public function informasiPsb(){
        $info=Taj::where('status', '1')->first();
        view()->share('title', 'Informasi PPDB');
        return view('home.akademik.informasi-psb', compact('info'));
    }

}
