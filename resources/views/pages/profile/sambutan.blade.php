<form wire:submit="createOrUpdate">
    <textarea wire:model='sambutan' class="form-control" id="" cols="30" rows="10"></textarea>
    <x-input  type="file" name="image" title="Unggah Gambar"/>
    <img src="{{ asset($image ? $image->temporaryUrl(): 'storage/'.$oldImage) }}" class="mt-3 img-fluid" width="300">
    <x-btn-form/>
</form>
