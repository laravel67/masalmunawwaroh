<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use App\Models\Struktur;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class CreateStruktur extends Component
{
    public $image, $periode, $oldImage, $idStruktur;
    public $isEditing=false;
    

    use WithPagination, WithFileUploads;
    public $search = '';

    public $deletId;

    protected $listeners = [
        'deleteConfirmed' => 'delete'
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

    public function store(){
        $this->validate([
            'periode'=>'required|unique:strukturs,periode|max:9',
            'image'=>'required|image|max:1024'
        ]);

        $imageName='';
        if($this->image){
            $imageName='struktur-mas-'.$this->periode . '.' .$this->image->getClientOriginalExtension();
            $this->image->storeAs('struktur', $imageName, 'public');
        }
        $struktur=[
            'periode'=> $this->periode,
            'image'=> $imageName,
        ];
        Struktur::create($struktur);
        Storage::disk('local')->deleteDirectory('livewire-tmp');
        return redirect()->route('profilemas.struktur')->with('success', "Struktur Organisasi masa jabatan {$this->periode} berhasil ditambah");
    }

    public function edit($id){
        $struktur=Struktur::findOrFail($id);
        $this->idStruktur=$struktur->id;
        $this->periode=$struktur->periode;
        $this->oldImage=$struktur->image;
        $this->isEditing=true;
    }

        public function update()
    {
        $this->validate([
            'periode' => 'required|unique:strukturs,periode,' . $this->idStruktur . '|max:9',
            'image' => 'nullable|image|max:1024'
        ]);

        $struktur = Struktur::findOrFail($this->idStruktur);

        $imageName = $this->oldImage; // Default to old image

        if ($this->image) {
            if ($this->oldImage) {
                Storage::delete('struktur/' . $this->oldImage);
            }
            $imageName = 'struktur-mas-' . $this->periode . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('struktur', $imageName, 'public');
        }

        // Update model with new data
        $struktur->update([
            'periode' => $this->periode,
            'image' => $imageName
        ]);
        Storage::disk('local')->deleteDirectory('livewire-tmp');
        return redirect()->route('profilemas.struktur')->with('success', "Struktur Organisasi masa jabatan {$this->periode} berhasil diubah");
    }


    public function deleting($id)
    {
        $this->idStruktur = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function delete()
    {
        $struktur = Struktur::where('id', $this->idStruktur)->first();
        if ($struktur) {
            if ($struktur->image) {
                Storage::delete('struktur/' . $struktur->image);
            }
            $struktur->delete();
        }
        return redirect()->route('profilemas.struktur')->with('success', 'Struktur Organisasi Berhasil dihapus!');
    }

    public function cancel(){
        $this->idStruktur='';
        $this->image='';
        $this->oldImage='';
        $this->periode='';
        $this->isEditing=false;
    }

    

    public function render()
    {
        $strukturs = Struktur::where('periode', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(5);
        return view('pages.profile.create-struktur', compact('strukturs'));
    }


}
