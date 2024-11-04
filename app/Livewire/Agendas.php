<?php

namespace App\Livewire;

use App\Models\Agenda;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Agendas extends Component
{
    use WithPagination;
    public $search = '';
    public $deleteId;
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
        $agendas = Agenda::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(10);
        return view('pages.agendas', compact('agendas'));
    }

    public function deleting($slug)
    {
        $this->deleteId = $slug;
        $this->dispatch('show-delete-confirmation');
    }

    public function delete()
    {
        $agenda = Agenda::where('slug', $this->deleteId)->first();
        if ($agenda) {
            if ($agenda->image) {
                Storage::delete($agenda->image);
            }
            $agenda->delete();
        }
        return redirect()->route('acara.index')->with('success', 'Agenda / Acara Berhasil dihapus!');
    }

}
