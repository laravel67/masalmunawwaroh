<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('Data BEM') }}</h3>
                <div class="card-tools">
                    <x-search/>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Masa Baksti') }}</th>
                            <th scope="col">{{ __('Kategori') }}</th>
                            <th scope="col">{{ __('Aksi') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bems as $bem)
                            <tr>
                                <td>{{ $bem->periode }}</td>
                                <td>{{ $bem->category == 'PA' ? __('BEM PUTRA') : __('BEM PUTRI') }}</td>
                                <td>
                                    <x-btnAct>
                                        <x-act title="Preview" href="{{ route('bems') }}" icon="book-open" />
                                        <x-act title="Ubah" wire:click="edit({{ $bem->id }})" icon="edit" />
                                        <x-act title="Hapus" wire:click="deleting({{ $bem->id }})" icon="trash" />
                                    </x-btnAct>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="3" class="text-center">{{ __('No data available') }}</td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="px-2">{{ $bems->links() }}</div>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">{{ $isEditing ? __('Update Struktur BEM') : __('Tambah Struktur BEM') }}</h3>
                </div>
                <div class="card-body">
                    <x-input title="Masa Bakti" name="periode" />
                    <x-input-select title="Kategori" name="category" :defaultOptions="[['value' => 'PA', 'label' => 'BEM PUTRA'], ['value' => 'PI', 'label' => 'BEM PUTRI']]" />
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
