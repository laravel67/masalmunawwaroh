<?php

namespace App\Livewire\Psb;

use App\Models\Taj;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Pengaturan extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $name, $chief, $body, $image, $oldImage, $status;
    public $editId;
    public $isEditing = false;

    protected $listeners = [
        'deleteConfirmed' => 'delete'
    ];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // public function updatedName($value)
    // {
    //     if (strlen($value) == 4 && is_numeric($value)) {
    //         $nextYear = str_pad((int)$value + 1, 4, '0', STR_PAD_LEFT);
    //         $this->name = $value . '-' . $nextYear;
    //     }
    // }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:9|unique:tajs,name',
            'chief' => 'required|string|max:255',
            'body' => 'required',
            'image' => 'nullable|image|max:1024'
        ]);

        $taj=new Taj();
        $taj->fill([
            'name' => $this->name,
            'chief' => $this->chief,
            'body' => $this->body,
            'image' => $this->image,
        ]);

        if ($this->image) {
            $taj->image = $this->image->store('brosurs', 'public');
        }
        $taj->save();
        Storage::disk('local')->deleteDirectory('livewire-tmp');
        $this->resetInputFields();

        return redirect()->route('pengaturan.psb')->with('success', 'Tahun Ajaran baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $taj = Taj::findOrFail($id);
        $this->fill([
            'name' => $taj->name,
            'chief' => $taj->chief,
            'body' => $taj->body,
            'oldImage' => $taj->image,
            'status' => $taj->status,
            'editId' => $taj->id,
            'isEditing' => true
        ]);
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:9|unique:tajs,name,' . $this->editId,
            'chief' => 'required|string|max:255',
            'body' => 'required',
            'image' => 'nullable|image|max:1024'
        ]);

        $taj = Taj::findOrFail($this->editId);

        if ($this->image) {
            if ($taj->image) {
                Storage::disk('public')->delete($taj->image);
            }
            $taj->image = $this->image->store('brosurs', 'public');
        }

        $taj->update([
            'name' => $this->name,
            'chief' => $this->chief,
            'body' => $this->body,
            'status' => $this->status,
            'image' => $taj->image,
        ]);

        Storage::disk('local')->deleteDirectory('livewire-tmp');

        $this->resetInputFields();

        return redirect()->route('pengaturan.psb')->with('success', 'Tahun Ajaran berhasil diubah!');
    }

    public function active($id)
    {
        Taj::where('status', '1')->update(['status' => '0']);
        Taj::findOrFail($id)->update(['status' => '1']);
    }

    public function unactive($id)
    {
        Taj::findOrFail($id)->update(['status' => '0']);
    }

    public function deleting($id)
    {
        $this->editId = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function delete()
    {
        $taj = Taj::find($this->editId);
        if ($taj) {
            if ($taj->image) {
                Storage::disk('public')->delete($taj->image);
            }
            $taj->delete();
        }
        return redirect()->route('pengaturan.psb')->with('success', 'Tahun Ajaran berhasil dihapus!');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->chief = '';
        $this->body = '';
        $this->image = null;
        $this->status = '';
        $this->editId = null;
        $this->isEditing = false;
    }

    public function render()
    {
        $tajs = Taj::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(5);
        return view('pages.psb.pengaturan', compact('tajs'));
    }
}
