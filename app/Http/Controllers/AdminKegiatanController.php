<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class AdminKegiatanController extends Controller
{

    public function __construct()
    {
        return view()->share('title', 'Kelola Kegiatan');
    }
  
    public function index()
    {
        return view('dashboard.kegiatan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'required|unique:kegiatans,name|max:255',
            'body'=>'required'
        ]);
        Kegiatan::create($validated);
        return redirect()->route('akegiatan.index')->with('success', 'Kegiatan Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kegiatan $kegiatan)
    {
        return view('dashboard.kegiatan.show', compact('kegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        return view('dashboard.kegiatan.edit', compact('kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:kegiatans,name,' . $kegiatan->id,
            'body' => 'required'
        ]);

        $kegiatan->update($validated);

        return redirect()->route('akegiatan.index')->with('success', 'Kegiatan Berhasil diubah!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        //
    }
}
