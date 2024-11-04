<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('Data Arsip') }}</h3>
                <div class="card-tools">
                    <x-search/>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Nama Arsip') }}</th>
                            <th scope="col">{{ __('Link') }}</th>
                            <th scope="col">{{ __('Aksi') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($arsips as $arsip)
                            <tr>
                                <td>{{ $arsip->name }}</td>
                                <td><a href="{{ $arsip->link }}" target="_blank">{{ __('Lihat Arsip') }}</a></td>
                                <td>
                                    <x-btnAct>
                                        <x-act title="Ubah" wire:click="edit({{ $arsip->id }})" icon="edit" />
                                        <x-act title="Hapus" wire:click="deleting({{ $arsip->id }})" icon="trash" />
                                    </x-btnAct>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="3" class="text-center">{{ __('No data available') }}</td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="px-2">{{ $arsips->links() }}</div>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">{{ $isEditing ? __('Update Arsip') : __('Tambah Arsip') }}</h3>
                </div>
                <div class="card-body">
                    <x-input title="Nama Arsip" name="name" />
                    <x-input title="Link Google Drive" name="link" type="url" />
                </div>
                <div class="card-footer text-right">
                    <button type="button" wire:click='cancel' class="btn btn-danger">{{ __('Batal') }}</button>
                    <button type="submit" class="btn btn-success">{{ __('Simpan') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
