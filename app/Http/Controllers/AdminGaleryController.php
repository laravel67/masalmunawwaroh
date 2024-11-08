<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminGaleryController extends Controller
{
    // public function __construct()
    // {
    //     return view()->share('title', 'Album Foto dan Video');
    // }

    public function index()
    {
        view()->share('title', 'Album Foto dan Video');
        return view('dashboard.kesiswaan.galeri');
    }

    public function ekskul()
    {
        view()->share('title', 'Ekstrakulikuler');
        return view('dashboard.kesiswaan.ekskul');
    }

}
