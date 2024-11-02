<?php

namespace App\Http\Controllers\Home;

use App\Models\Galeri;
use App\Http\Controllers\Controller;
use App\Models\Lifeskill;
use App\Models\Persada;

class KesiswaanController extends Controller
{
    public function lifeskill()
    {
        view()->share('title', 'Ekstra Kulikuler');
        $fisik = Lifeskill::where('category', 'fisik')->orderBy('id', 'desc')->get();
        $nonfisik = Lifeskill::where('category', 'nonfisik')->orderBy('id', 'desc')->get();
        return view('home.kesiswaan.lifeskill', compact('fisik', 'nonfisik'));
    }

    public function lifeskillDetail($slug){
        $lifeskill = Lifeskill::where('slug', $slug)->firstOrFail();
        view()->share('title', $lifeskill->name);
        return view('home.kesiswaan.lifeskill-detail', ['lifeskill' => $lifeskill]);
    }

    public function bem()
    {
        $pa = Persada::where('category', 'PA')->latest()->first();
        $pi = Persada::where('category', 'PI')->latest()->first();
        if (!$pa && !$pi) {
            $priode = '-'; // Or any default value you want
        } else {
            $priode = $pa->priode ?? $pi->priode;
        }
        view()->share('title', 'BEM Masa Bakti ' . $priode);
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
        return view('home.kesiswaan.kegiatan');
    }
}
