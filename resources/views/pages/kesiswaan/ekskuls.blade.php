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
                        @forelse ($ekskuls as $ekskul)
                            <tr>
                                <td>{{ $ekskul->name }}</td>
                                <td>{{ $ekskul->category == 'fisik' ? __('Fisik') : __('Non Fisik') }}</td>
                                <td>
                                    <x-btnAct>
                                        <x-act title="Preview" href="{{ route('ekskul.detail', $ekskul->slug) }}" icon="book-open" />
                                        <x-act title="Ubah" wire:click="edit({{ $ekskul->id }})" icon="edit" />
                                        <x-act title="Hapus" wire:click="deleting({{ $ekskul->id }})" icon="trash" />
                                    </x-btnAct>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="3" class="text-center">{{ __('No data available') }}</td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="px-2">{{ $ekskuls->links() }}</div>
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
                    @if ($isEditing && $image)
                    <img src="{{ $image->temporaryUrl() }}" alt="New Image Preview" class="img-thumbnail mt-2">
                    @elseif ($isEditing && $oldImage)
                    <img src="{{ asset('storage/' . $oldImage) }}" alt="Existing Image" class="img-thumbnail mt-2">
                    @elseif (!$isEditing && $image)
                    <img src="{{ $image->temporaryUrl() }}" alt="New Image Preview" class="img-thumbnail mt-2">
                    @endif
                </div>
                <div class="card-footer text-right">
                    <button type="button" wire:click='cancel' class="btn btn-danger">{{ __('Batal') }}</button>
                    <button type="submit" class="btn btn-success">{{ __('Simpan') }}</button>
                </div>
            </div>
        </form>
        
    </div>
</div>
