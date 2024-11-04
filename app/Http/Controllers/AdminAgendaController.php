<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminAgendaController extends Controller
{
    public function __construct()
    {
        return view()->share('title', 'Daftar Acara dan Agenda');
    }

    public function index()
    {
        return view('dashboard.agenda.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:agendas,slug',
            'category' => 'required|in:Acara,Agenda',
            'waktu' => 'required|date',
            'tempat' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('agendas', 'public');
        $validatedData['image'] = $imagePath;
        }
        Agenda::create($validatedData);
        return redirect()->route('acara.index')->with('success', 'Agenda berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        return view('dashboard.agenda.index');
    }


    public function edit(Agenda $agenda)
    {
        return view('dashboard.agenda.edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agenda $agenda)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:agendas,slug,'.$agenda->id,
            'category' => 'required|in:Acara,Agenda',
            'waktu' => 'required|date',
            'tempat' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            if($agenda->image){
                Storage::disk('public')->delete($agenda->image);
            }
            $imagePath = $request->file('image')->store('agendas', 'public');
            $validatedData['image'] = $imagePath;
        }

        $agenda->update($validatedData);
        return redirect()->route('acara.index')->with('success', 'Agenda berhasil diubah!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        //
    }

    public function slugAgenda(Request $request)
    {
        $slug = SlugService::createSlug(Agenda::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
