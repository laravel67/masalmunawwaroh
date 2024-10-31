<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Sambutan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProfilemasController extends Controller
{
    public function __construct()
    {
        return view()->share('title', 'Kelola Profile Madrasah');
    }

    public function struktur(){
        return view('dashboard.profilemas.struktur');
    }

    public function sambutan(){
        return view('dashboard.profilemas.sambutan');
    }

    public function visiMisi(){
        $profile=Profile::first();
        $visimisi = $profile ? $profile->visimisi : "";
        return view('dashboard.profilemas.visi-misi', compact('visimisi'));
    }

    public function mars(){
        $profile=Profile::first();
        $mars = $profile ? $profile->mars : "";
        return view('dashboard.profilemas.mars', compact('mars'));
    }

    public function updateVisi(Request $request)
    {
        $request->validate([
            'visimisi' => 'required|string',
        ]);
        $profile = Profile::first() ?? new Profile();
        $profile->visimisi = $request->input('visimisi');
        $profile->save();
        return redirect()->route('profilemas.visimisi')->with('success', 'Visi & Misi Madrasah berhasil diperbarui!');
    }

    public function updateMars(Request $request)
    {
        $request->validate([
            'mars' => 'required|string',
        ]);
        $profile = Profile::first() ?? new Profile();
        $profile->mars = $request->input('mars');
        $profile->save();
        return redirect()->route('profilemas.mars')->with('success', 'Mars Madrasah berhasil diperbarui!');
    }
}
