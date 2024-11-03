<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Program as ModelsProgram;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Program extends Component
{
    use WithPagination;
    public $search = '';
    public $idProgram;

    protected $listeners = ['deleteConfirmed' => 'destroy'];

    protected $queryString = ['search' => ['except' => '']];

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
        $programs = ModelsProgram::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(10);
        return view('pages.program', compact('programs'));
    }


    public function deleting($id)
    {
        $this->idProgram = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function destroy()
    {
        $program = ModelsProgram::findOrFail($this->idProgram);
        if ($program->image) {
            Storage::delete($program->image);
        }
        $program->delete();

        return redirect()->route('aprogram.index')->with('success', 'Program Unggulan berhasil dihapus!');
    }
}
