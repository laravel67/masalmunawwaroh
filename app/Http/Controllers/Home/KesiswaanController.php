<?php

namespace App\Http\Controllers\Home;

use App\Models\Galeri;
use App\Http\Controllers\Controller;
use App\Models\Bem;
use App\Models\Ekskul;
use App\Models\Kegiatan;
use App\Models\Lifeskill;
use App\Models\Persada;

class KesiswaanController extends Controller
{
    public function ekskul()
    {
        view()->share('title', 'Ekstra Kulikuler');
        $fisik = Ekskul::where('category', 'fisik')->orderBy('id', 'desc')->get();
        $nonfisik = Ekskul::where('category', 'nonfisik')->orderBy('id', 'desc')->get();
        return view('home.kesiswaan.ekskul', compact('fisik', 'nonfisik'));
    }

    public function ekskulDetail($slug){
        $ekskul = Ekskul::where('slug', $slug)->firstOrFail();
        view()->share('title', $ekskul->name);
        return view('home.kesiswaan.ekskul-detail', ['ekskul' => $ekskul]);
    }

    public function bem()
    {
        $pa = Bem::where('category', 'PA')->latest()->first();
        $pi = Bem::where('category', 'PI')->latest()->first();
        if (!$pa && !$pi) {
            $periode = '-'; // Or any default value you want
        } else {
            $periode = $pa->periode ?? $pi->periode;
        }
        view()->share('title', 'BEM Masa Bakti ' . $periode);
        return view('home.kesiswaan.bem', compact('pa', 'pi'));
    }

    public function album()
    {
        view()->share('title', 'Album Foto dan Video');
        $galeries  = Galeri::latest()->paginate(12);
        return view('home.kesiswaan.galery', compact('galeries'));
    }

    public function albumDetail($slug){
        $galery=Galeri::where('slug', $slug)->firstOrFail();
        $title='';
        if($galery->category =="foto"){
            $title='Album Foto';
        }else{
            $title='Album Video';
        }
        view()->share('title', $title);
        return view('home.kesiswaan.galery-detail', compact('galery'));
    }

    public function kegiatan(){
        view()->share('title', 'Kegiatan Rutinitas Siswa/Santri');
        $kegiatans=Kegiatan::all();
        return view('home.kesiswaan.kegiatan', compact('kegiatans'));
    }
}
