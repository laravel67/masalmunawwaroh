<?php

namespace App\Http\Controllers;

use App\Models\Achievment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminAchievmentController extends Controller
{
    public function __construct()
    {
        return view()->share('title', 'Kelola Pencapaian/Prestasi/Penghargaan');
    }

    public function index()
    {
        return view('dashboard.achievments.index');
    }

    public function create()
    {

        return view('dashboard.achievments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:achievments,slug',
            'category' => 'required',
            'body' => 'required|string',
            'image' => 'file|image|max:1024',
        ]);
        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('prestasi', 'public');
        }
        Achievment::create($validated);
        return redirect(route('prestasi.index'))->with('success', 'Prestasi berhasil disimpan!');
    }

    public function show(Achievment $prestasi)
    {
        return view('dashboard.achievments.show', compact('prestasi'));
    }

    public function edit(Achievment $prestasi)
    {
        return view('dashboard.achievments.edit', compact('prestasi'));
    }


    public function update(Request $request, Achievment $prestasi)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'slug'=> 'required|string|unique:achievments,slug,'.$prestasi->id,
            'category' => 'required',
            'body' => 'required|string',
            'image' => 'nullable|image|max:1024',
        ];
        $validated = $request->validate($rules);
        if ($request->file('image')) {
            if ($prestasi->image) {
                Storage::delete($prestasi->image);
            }
            $validated['image'] = $request->file('image')->store('prestasi', 'public');
        }
        Achievment::where('id', $prestasi->id)->update($validated);
        return redirect(route('prestasi.index'))->with('success', 'Prestasi berhasil diubah');
    }

    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Achievment::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
