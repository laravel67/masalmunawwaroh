<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('Data Ekstrakulikuler') }}</h3>
                <div class="card-tools">
                    <x-search/>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Nama Ekstrakulikuler') }}</th>
                            <th scope="col">{{ __('Kategori') }}</th>
                            <th scope="col">{{ __('Aksi') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lifes as $galery)
                            <tr>
                                <td>{{ $galery->name }}</td>
                                <td>{{ $galery->category == 'fisik' ? __('Fisik') : __('Non Fisik') }}</td>
                                <td>
                                    <x-btnAct>
                                        <x-act title="Preview" href="{{ route('album.detail', $galery->slug) }}" icon="book-open" />
                                        <x-act title="Ubah" wire:click="edit({{ $galery->id }})" icon="edit" />
                                        <x-act title="Hapus" wire:click="deleting({{ $galery->id }})" icon="trash" />
                                    </x-btnAct>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="3" class="text-center">{{ __('No data available') }}</td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="px-2">{{ $lifes->links() }}</div>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <form wire:submit.prevent="{{ $isEditing ? 'update' : 'submit' }}">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">{{ $isEditing ? __('Update Ekstrakulikuler') : __('Tambah Ekstrakulikuler') }}</h3>
                </div>
                <div class="card-body">
                    <x-input title="Nama Ekstrakulikuler" name="name" />
                    <x-input title="Slug Ekstrakulikuler" name="slug" readonly />
                    <x-input-select title="Kategori" name="category" :defaultOptions="[['value' => 'fisik', 'label' => 'Fisik'], ['value' => 'nonfisik', 'label' => 'Non Fisik']]" />
                    <label for="body">{{ __('Deskripsikan Ekstrakulikuler') }}</label>
                    <textarea wire:model="body" name="body" class="form-control mb-3" cols="30" rows="10"></textarea>
                    <x-input title="Upload Gambar" name="image" type="file" /> 
        
                    @if ($isEditing && $oldImage)
                        <img src="{{ $oldImage }}" alt="Existing Image" class="img-thumbnail mt-2">
                    @elseif ($image)
                        <img src="{{ $image->temporaryUrl() }}" alt="New Image Preview" class="img-thumbnail mt-2">
                    @endif
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">{{ __('Simpan Ekstrakulikuler') }}</button>
                </div>
            </div>
        </form>
        
    </div>
</div>
