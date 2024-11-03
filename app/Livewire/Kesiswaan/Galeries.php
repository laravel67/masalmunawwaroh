<?php

namespace App\Livewire\Kesiswaan;

use App\Models\Galeri;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Galeries extends Component
{
    use WithFileUploads, WithPagination;

    public $title, $slug, $category, $body, $linkVideo, $images = [], $oldImages = [];
    public $isEditing=false;
    public $galeriId;
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

    public function updatedTitle($value)
    {
        $this->slug = $this->generateUniqueSlug($value);
    }

    protected function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $count = Galeri::where('slug', $slug)->count();

        if ($count > 0) {
            $slug = $this->addUniqueSuffix($slug, $count);
        }

        return $slug;
    }

    protected function addUniqueSuffix($slug, $count)
    {
        return $slug . '-' . ($count + 1);
    }

    public function updatedCategory($value)
    {
        if ($value === 'foto') {
            $this->linkVideo = null;
        } elseif ($value === 'video') {
            $this->images = [];
        }
    }

    public function storeOrUpdateAlbum()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:galeris,slug' . ($this->isEditing ? ",{$this->galeriId}" : ''),
            'category' => 'required|in:foto,video',
            'body' => 'nullable|string',
            'images.*' => 'image|max:1024',
            'linkVideo' => 'nullable|url'
        ]);
    
        $album = $this->isEditing ? Galeri::findOrFail($this->galeriId) : new Galeri();
        
        $album->title = $this->title;
        $album->slug = $this->slug;
        $album->category = $this->category;
        $album->body = $this->body;
    
        if ($this->category === 'foto') {
            if ($this->isEditing && !empty($this->images)) {
                $oldImages = is_string($this->oldImages) ? json_decode($this->oldImages, true) : [];
                $oldImages = is_array($oldImages) ? $oldImages : [];
                foreach ($oldImages as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
                
                $uploadedImages = [];
                foreach ($this->images as $image) {
                    $uploadedImages[] = $image->store('albums', 'public');
                }
        
                $album->images = json_encode($uploadedImages);
            } elseif ($this->isEditing) {
                $album->images = $this->oldImages;
            } else {
                $uploadedImages = [];
                foreach ($this->images as $image) {
                    $uploadedImages[] = $image->store('albums', 'public');
                }
                $album->images = json_encode($uploadedImages);
            }
        } elseif ($this->category === 'video') {
            $album->link_video = $this->linkVideo;
        }
        
    
        $album->save();
        $this->reset(['title', 'slug', 'category', 'body', 'images', 'linkVideo']);
        Storage::disk('local')->deleteDirectory('livewire-tmp');
        $pesan='';
        if($this->isEditing){
            $pesan='Album berhasil diubah';
        }else{
            $pesan='Album berhasil ditambah';
        }
        return redirect()->route('galeri.index')->with('success', $pesan);
        
    }
    
    public function editing($id)
    {
        $galeri = Galeri::findOrFail($id);
        $this->galeriId = $galeri->id;
        $this->title = $galeri->title;
        $this->slug = $galeri->slug;
        $this->category = $galeri->category;
        $this->body = $galeri->body;
        $this->linkVideo = $galeri->link_video;
        $this->oldImages = $galeri->images;
        $this->isEditing = true;
    }

    public function removeImage($index)
    {
        unset($this->images[$index]);
        $this->images = array_values($this->images);
    }


    public function deleting($id)
    {
        $this->galeriId = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function delete()
    {
        $galeri = Galeri::findOrFail($this->galeriId);
    
        if ($galeri) {
            if ($galeri->images) {
                $images = json_decode($galeri->images);
                
                if (is_array($images)) {
                    foreach ($images as $image) {
                        Storage::disk('public')->delete($image);
                    }
                }
            }
            
            $galeri->delete(); 
        }
    
        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dihapus!');
    }
    

    public function render()
    {
        $galeries=Galeri::where('title', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(10);
        return view('pages.kesiswaan.galeries', compact('galeries'));
    }
}
