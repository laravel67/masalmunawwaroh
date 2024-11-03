<?php

namespace App\Livewire\Kesiswaan;

use App\Models\Ekskul;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Ekskuls extends Component
{
    use WithFileUploads;
    use WithPagination;
    
    public $name, $slug, $category, $image, $oldImage, $body;
    public $isEditing = false;
    public $search = '';
    public $idLs;
    
    protected $listeners = [
        'deleteConfirmed' => 'delete'
    ];

    protected $queryString = [
        'search' => ['except' => '']
    ];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedName($value)
    {
        $this->slug = $this->generateUniqueSlug($value);
    }

    protected function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $count = Ekskul::where('slug', $slug)->count();

        return $count > 0 ? $slug . '-' . ($count + 1) : $slug;
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|unique:ekskuls,name',
            'slug' => 'required|unique:ekskuls,slug',
            'category' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024',
        ]);

        $ekskul = new Ekskul();
        $ekskul->fill([
            'name' => $this->name,
            'slug' => $this->slug,
            'category' => $this->category,
            'body' => $this->body,
        ]);
        if ($this->image) {
            $ekskul->image = $this->image->store('ekskuls', 'public');
        }


        $ekskul->save();
        $this->resetForm();
        Storage::disk('local')->deleteDirectory('livewire-tmp');
        
        return redirect()->route('ekskul.index')->with('success', 'Ekstra Kulikuler berhasil disimpan!');
    }

    public function edit($id)
    {
        $ekskul = Ekskul::findOrFail($id);
        $this->fill([
            'idLs' => $ekskul->id,
            'name' => $ekskul->name,
            'slug' => $ekskul->slug,
            'body' => $ekskul->body,
            'category' => $ekskul->category,
            'oldImage' => $ekskul->image,
            'isEditing' => true,
        ]);
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|unique:ekskuls,name,' . $this->idLs,
            'slug' => 'required|unique:ekskuls,slug,' . $this->idLs,
            'category' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024',
        ]);

        $ekskul = Ekskul::findOrFail($this->idLs);
        $ekskul->fill([
            'name' => $this->name,
            'category' => $this->category,
            'body' => $this->body,
        ]);

        if ($this->image) {
            if ($ekskul->image) {
                Storage::disk('public')->delete($ekskul->image);
            }
            $ekskul->image = $this->image->store('ekskuls', 'public');
        }

        $ekskul->save();
        $this->cancel();
        Storage::disk('local')->deleteDirectory('livewire-tmp');
        return redirect()->route('ekskul.index')->with('success', 'Ekstra Kulikuler berhasil di ubah!');
    }

    public function resetForm()
    {
        $this->name = '';
        $this->slug = '';
        $this->category = '';
        $this->body = '';
        $this->image = '';
        $this->oldImage = null;
        $this->isEditing = false;
    }

    public function cancel(){
        $this->resetForm();
    }

    public function deleting($id){
        $this->idLs=$id;
        $this->dispatch('show-delete-confirmation');
    }

    public function delete()
    {
        $ekskul = Ekskul::find($this->idLs);
        if ($ekskul) {
            if ($ekskul->image) {
                Storage::disk('public')->delete($ekskul->image);
            }
            $ekskul->delete();
        }
        
        return redirect()->route('ekskul.index')->with('success', 'Ekstra Kulikuler berhasil dihapus!');
    }

    public function render()
    {
        $ekskuls = Ekskul::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(10);
        return view('pages.kesiswaan.ekskuls', compact('ekskuls'));
    }

}
