<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use App\Models\Program as ModelsProgram;

class Program extends Component
{
    use WithPagination;
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

    
    public function render()
    {
        $programs = ModelsProgram::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('pages.program', ['programs' => $programs]);
    }
    
    public function deleting($slug)
    {
        $this->deletId = $slug;
        $this->dispatch('show-delete-confirmation');
    }

    public function delete()
    {
        $program = ModelsProgram::where('slug', $this->deletId)->first();
        if ($program) {
            if ($program->image) {
                Storage::delete($program->image);
            }
            $program->delete();
        }
        return redirect()->route('aprogram.index')->with('success', 'Program Berhasil dihapus');
    }
}
