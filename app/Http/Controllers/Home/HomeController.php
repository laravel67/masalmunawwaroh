<?php

namespace App\Http\Controllers\Home;

use App\Models\Guru;
use App\Models\Post;
use App\Models\Slide;
use App\Models\Alumni;
use App\Models\Galeri;
use App\Models\Achievment;
use App\Http\Controllers\Controller;
use App\Models\Taj;

class HomeController extends Controller
{
    public function home()
    {
        $totalGuru=Guru::count();
        $totalPrestasi=Achievment::count();
        $posts = Post::orderBy('id', 'desc')->take(3)->get();
        $gurus = Guru::orderBy('id', 'desc')->take(4)->get();
        $galeri = Galeri::orderBy('id', 'desc')->take(5)->get();
        $slides = Slide::orderBy('id', 'desc')->take(5)->get();
        $alumnus=Alumni::orderBy('id', 'desc')->get();
        $totalAlumnus=Alumni::count();
        $info = Taj::where('status', '1')->first();
        return view('home.homepages.index', 
                    compact('posts',
                            'galeri', 
                            'slides', 
                            'totalGuru', 
                            'totalPrestasi', 
                            'gurus', 
                            'alumnus', 
                            'totalAlumnus',
                            'info'
                        ));
    }
}
