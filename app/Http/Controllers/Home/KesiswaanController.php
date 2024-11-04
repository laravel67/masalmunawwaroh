<?php

namespace App\Http\Controllers\Home;

use DB;
use App\Models\Bem;
use App\Models\Alumni;
use App\Models\Ekskul;
use App\Models\Galeri;
use App\Models\Persada;
use App\Models\Kegiatan;
use App\Models\Lifeskill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Colors\Rgb\Channels\Red;

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

    public function alumnus(){
        view()->share('title', 'Pesan dan Kesan Alumni');
        $kesans=Alumni::latest()->get();
        return view('home.kesiswaan.alumnus', compact('kesans'));
    }

    public function createPesanOrKesan(Request $request)
    {
        // Validate the form input
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:kerja,pendidikan',
            'tempat' => 'required|string|max:255',
            'angkatan' => 'required|integer|min:1|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image
            'message' => 'required|string',
        ]);

        // Handle file upload if an image is uploaded
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('alumnus', 'public');
        }

        // Save data to the alumnis table
        Alumni::create([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
            'tempat' => $request->input('tempat'),
            'angkat' => $request->input('angkatan'),
            'image' => $imagePath,
            'pesan_kesan' => $request->input('message'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back()->with('success', 'Pesan dan Kesan berhasil dikirim.');
    }



}
