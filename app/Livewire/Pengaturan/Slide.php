<?php

namespace App\Livewire\Pengaturan;

use Livewire\Component;
use App\Models\Slide as Sld;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Slide extends Component
{
    use WithPagination, WithFileUploads;
    public $isEditing = false;
    public $slideId, $caption, $image, $oldImage;

    protected $listeners = [
        'deleteConfirmed' => 'delete'
    ];
    public function render()
    {
        $slides = Sld::orderBy('id', 'desc')->paginate(5);
        return view('pages.pengaturan.slide', compact('slides'));
    }

    public function store()
    {
        $this->validate([
            'caption' => 'required|max:100|unique:slides,caption',
            'image' => 'required|image|max:1024',
        ]);
        $slide = new Sld();
        if ($this->image) {
            $slide->image = $this->image->store('slides', 'public');
        }
        $slide->fill([
            'caption' => $this->caption,
            'image' => $this->image,
        ]);
        $slide->save();
        Storage::disk('local')->deleteDirectory('livewire-tmp');
    
        return redirect()->route('pengaturan.slider')->with('success', 'Slide baru berhasil ditambahkan!');
    }
    

    public function edit($id)
    {
        $slide = Sld::findOrFail($id);
        $this->slideId = $slide->id;
        $this->caption = $slide->caption;
        $this->oldImage = $slide->image;
        $this->isEditing = true;
    }


    public function update()
    {
        $this->validate([
            'caption' => 'required|max:100|unique:slides,caption,' . $this->slideId,
            'image' => 'nullable|image|max:1024',
        ]);

        $slide = Sld::findOrFail($this->slideId);
        if ($this->image) {
            if ($slide->image) {
                Storage::disk('public')->delete($slide->image);
            }
            $slide->image = $this->image->store('slides', 'public');
        }

        $slide->update([
            'caption' => $this->caption,
            'image' => $this->oldImage
        ]);
        Storage::disk('local')->deleteDirectory('livewire-tmp');

        return redirect()->route('pengaturan.slider')->with('success', 'Slide berhasil diperbarui!');
    }


    public function cancel()
    {
        $this->slideId = '';
        $this->caption = '';
        $this->oldImage = '';
        $this->isEditing = false;
    }

    public function deleting($id)
    {
        $this->slideId = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function delete()
    {
        $slide = Sld::where('id', $this->slideId)->first();
        if ($slide) {
            dd($slide->image);
            if ($slide->image) {
                Storage::disk('public')->delete($slide->image);
            }
            $slide->delete();
        }
        return redirect()->route('pengaturan.slider')->with('success', 'Slide Berhasil dihapus!');
    }
}
