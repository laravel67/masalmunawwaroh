<?php

namespace App\Livewire\Kesiswaan;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Bem as ModelsBem;
use Illuminate\Support\Facades\Storage;

class Bem extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search = '';
    public $idBem, $periode, $category, $image, $oldImage;
    public $isEditing = false;

    protected $listeners = [
        'deleteConfirmed' => 'destroy'
    ];

    protected $rules = [
        'periode' => 'required|string|max:4',
        'category' => 'required|in:PA,PI',
        'image' => 'nullable|image|max:2048'
    ];

    protected $updateQueryString = [
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

    public function store()
    {
        $this->validate([
            'periode' => 'required|string|max:9',
            'category' => 'required|in:PA,PI',
            'image' => 'required|image|max:2048'
        ]);
        $bem = new ModelsBem();
        $bem->fill([
            'periode' => $this->periode,
            'category' => $this->category,
        ]);
        if ($this->image) {
            $bem->image = $this->image->store('bems', 'public');
        }
        $bem->save();
        $this->resetForm();
        Storage::disk('local')->deleteDirectory('livewire-tmp');
        return redirect()->route('bem.index')->with('success', "Struktur Bem {$this->category} periode {$this->periode} berhasil ditambah");
    }

    public function edit($id)
    {
        $bem = ModelsBem::findOrFail($id);
        $this->idBem = $bem->id;
        $this->periode = $bem->periode;
        $this->category = $bem->category;
        $this->oldImage = $bem->image;
        $this->isEditing = true;
    }

    public function update()
    {

        $this->validate([
            'periode' => 'required|string|max:9',
            'category' => 'required',
            'image' => 'required|image|max:2048'
        ]);

        $bem = ModelsBem::findOrFail($this->idBem);
        $bem->fill([
            'periode' => $this->periode,
            'category' => $this->category,
        ]);

        if ($this->image) {
            if ($bem->image) {
                Storage::disk('public')->delete($bem->image);
            }
            $bem->image = $this->image->store('bems', 'public');
        }

        $bem->save();
        $this->resetForm();
        Storage::disk('local')->deleteDirectory('livewire-tmp');
        return redirect()->route('bem.index')->with('success', "Struktur Persada {$this->category} periode {$this->periode} berhasil diubah");
    }

    public function deleting($id)
    {
        $this->idBem = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function destroy()
    {
        $bem = ModelsBem::findOrFail($this->idBem);
        if ($bem) {
            if ($bem->image) {
                Storage::disk('public')->delete($bem->image);
            }
            $bem->delete();
        }
        
        return redirect()->route('bem.index')->with('success', 'Struktur Bem berhasil dihapus!');
    }

    public function resetForm()
    {
        $this->idBem = '';
        $this->periode = '';
        $this->category = '';
        $this->oldImage = '';
        $this->image='';
        $this->isEditing = false;
    }

    public function cancel(){
        $this->resetForm();
    }

    public function render()
    {
        $bems = ModelsBem::where('periode', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(2);
        return view('pages.kesiswaan.bem', compact('bems'));
    }
    
}
