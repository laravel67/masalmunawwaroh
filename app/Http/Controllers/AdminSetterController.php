<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSetterController extends Controller
{
    public function slider()
    {
        view()->share('title', 'Slide Heade Web');
        return view('dashboard.pengaturan.slide');
    }
}
