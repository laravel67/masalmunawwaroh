<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PsbController extends Controller
{
    public function dashboard(){
        return view('psb.dashboard');
    }
}
