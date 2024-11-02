<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminProgramController extends Controller
{

    public function index()
    {
        return view('dashboard.program.index');
    }

    public function create()
    {
        return view('dashboard.program.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:programs,name',
            'slug' => 'required|unique:programs,slug',
            'body' => 'required',
            'image' => 'nullable|image|max:1024|file',
        ]);
        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('programs', 'public');
        }
        Program::create($validated);
        return redirect()->route('aprogram.index')->with('success', 'Program Unggulan Berhasil ditambahkan!');
    }

    public function show(Program $program)
    {
        return view('dashboard.program.show',compact('program'));
    }

    public function edit(Program $program)
    {
        return view('dashboard.program.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:programs,name,'.$program->id,
            'slug' => 'required|unique:programs,slug,'.$program->id,
            'body' => 'required',
            'image' => 'nullable|image|max:1024|file',
        ]);

        if ($request->file('image')) {
            if ($program->image) {
                Storage::delete($program->image);
            }
            $validated['image'] = $request->file('image')->store('programs', 'public');
        }
        $program->update($validated);
        return redirect(route('aprogram.index'))->with('success', 'Program Unggulan Berhasil diubah!');
    }


    public function slugProgram(Request $request)
    {
        $slug = SlugService::createSlug(Program::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
