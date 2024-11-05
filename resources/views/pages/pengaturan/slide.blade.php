<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('Data Slides') }}</h3>
                <div class="card-tools">
                    <x-search/>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Judul Caption') }}</th>
                            <th scope="col">{{ __('Aksi') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($slides as $i => $slide)
                            <tr>
                                <td>{{ $slide->caption }}</td>
                                <td>
                                    <x-btnAct>
                                        <x-act title="Ubah" wire:click="edit({{ $slide->id }})" icon="edit" />
                                        <x-act title="Hapus" wire:click="deleting({{ $slide->id }})" icon="trash" />
                                    </x-btnAct>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="3" class="text-center">{{ __('No data available') }}</td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="px-2">{{ $slides->links() }}</div>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">{{ $isEditing ? __('Ubah Arsip') : __('Tambah Slide') }}</h3>
                </div>
                <div class="card-body">
                    <x-input title="Caption" name="caption" />
                    <x-input title="Gambar" name="image" type="file" />
                    @if ($image)
                    <img style="width: 200px;" src="{{ $image->temporaryUrl() }}">
                    @elseif ($isEditing && $oldImage)
                    <img style="width: 200px;" src="{{ asset('storage/'.$oldImage) }}">
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
