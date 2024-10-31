<?php

namespace App\Livewire\Profile;

use App\Models\Profile;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Sambutan extends Component
{
    use WithFileUploads;

    public $sambutan, $image, $oldImage;

    protected $rules = [
        'sambutan' => 'required|string',
        'image' => 'nullable|image|max:1024',
    ];

    public function mount()
    {
        $profile = Profile::first();
        if ($profile) {
            $this->sambutan = $profile->sambutan;
            $this->oldImage = $profile->image;
        }
    }

    public function render()
    {
        return view('pages.profile.sambutan');
    }

    public function createOrUpdate()
    {
        $this->validate();
        $profile = Profile::first() ?? new Profile();
        if ($this->image) {
            $imageName = 'kamad-mas-' . uniqid() . '.' . $this->image->getClientOriginalExtension();
            if ($this->oldImage) {
                Storage::disk('public')->delete('profiles/' . $this->oldImage);
            }
            $this->image->storeAs('profiles', $imageName, 'public');
            $profile->image = $imageName;
        } else {
            $profile->image = $this->oldImage;
        }
        $profile->sambutan = $this->sambutan;
        $profile->save();
        Storage::disk('local')->deleteDirectory('livewire-tmp');
        return redirect()->route('profilemas.sambutan')->with('success', 'Sambutan berhasil diperbarui!');
    }
}
