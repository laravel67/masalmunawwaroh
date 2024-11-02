<?php

namespace App\Livewire;

use App\Models\Kegiatan as ModelsKegiatan;
use Livewire\Component;
use Livewire\WithPagination;

class Kegiatan extends Component
{
    use WithPagination;
    public $deleteId;
    public $search='';

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

    public function render()
    {
        $kegiatans=ModelsKegiatan::where('name', 'like', '%' . $this->search . '%')->latest()->paginate(5);
        return view('pages.kegiatan', compact('kegiatans'));
    }

    public function deleting($id)
    {
        $this->deleteId = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function delete()
    {
        $kegiatan = ModelsKegiatan::where('id', $this->deleteId)->first();
        if ($kegiatan) {
            $kegiatan->delete();
        }
        return redirect()->route('akegiatan.index')->with('success', 'Kegiatan Berhasil dihapus!');
    }
}
