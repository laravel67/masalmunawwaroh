<?php

namespace App\Livewire\Informasi;

use App\Models\Arsip;
use Livewire\Component;
use Livewire\WithPagination;

class Arsips extends Component
{
    use WithPagination;

    public $search = '';
    public $idArsip, $name, $link;
    public $isEditing = false;

    protected $listeners = [
        'deleteConfirmed' => 'destroy'
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
            'name' => 'required|string|max:255',
            'link' => 'required|url',
        ]);

        $arsip = new Arsip();
        $arsip->fill([
            'name' => $this->name,
            'link' => $this->link,
        ]);

        $arsip->save();
        $this->resetForm();

        return redirect()->route('data.arsip')->with('success', "Arsip {$this->name} berhasil ditambah");
    }

    public function edit($id)
    {
        $arsip = Arsip::findOrFail($id);
        $this->idArsip = $arsip->id;
        $this->name = $arsip->name;
        $this->link = $arsip->link;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|url',
        ]);

        $arsip = Arsip::findOrFail($this->idArsip);
        $arsip->fill([
            'name' => $this->name,
            'link' => $this->link,
        ]);

        $arsip->save();
        $this->resetForm();

        return redirect()->route('data.arsip')->with('success', "Arsip {$this->name} berhasil diubah");
    }

    public function deleting($id)
    {
        $this->idArsip = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function destroy()
    {
        $arsip = Arsip::findOrFail($this->idArsip);
        if ($arsip) {
            $arsip->delete();
        }

        return redirect()->route('data.arsip')->with('success', 'Arsip berhasil dihapus!');
    }

    public function resetForm()
    {
        $this->idArsip = '';
        $this->name = '';
        $this->link = '';
        $this->isEditing = false;
    }

    public function cancel()
    {
        $this->resetForm();
    }

    public function render()
    {
        $arsips = Arsip::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(10);
        return view('pages.informasi.arsips', ['arsips' => $arsips]);
    }
}
