<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jabatan;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminGuruController extends Controller
{
    public function __construct()
    {
        return view()->share('title', 'Data Guru');
    }

    public function index()
    {
        return view('dashboard.teachers.index');
    }

    public function create()
    {
        return view('dashboard.teachers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:gurus,slug|max:255',
            'pendidikan' => 'required|string|max:255',
            'mulai_mengajar' => 'required|date',
            'guru_mapel' => 'nullable|max:50',
            'jabatan' => 'required|string|max:255',
            'biografi' => 'required',
            'image' => 'nullable|image|max:1024|file',
        ]);
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('guru-images');
        }
        $guru = Guru::create($validated);
        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambah!');
    }


    public function show(Guru $guru)
    {
        return view('dashboard.teachers.show', compact('guru'));
    }

    public function edit(Guru $guru)
    {
        return view('dashboard.teachers.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:gurus,slug,' . $guru->id . '|max:255',
            'pendidikan' => 'required|string|max:255',
            'mulai_mengajar' => 'required|date',
            'guru_mapel' => 'nullable|max:50',
            'jabatan' => 'required|string|max:255',
            'biografi' => 'required',
            'image' => 'nullable|image|max:1024|file',
        ];

        $validated = $request->validate($rules);
        if ($request->hasFile('image')) {
            // Hapus image lama jika ada
            if ($guru->image) {
                Storage::delete($guru->image);
            }
            // Simpan image baru
            $validated['image'] = $request->file('image')->store('guru-images');
        }
        $guru->update($validated);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diubah!');
    }

    public function slugGuru(Request $request)
    {
        $slug = SlugService::createSlug(Guru::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
