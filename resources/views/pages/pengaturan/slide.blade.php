{{-- <div class="row mt-4">
    <div class="col-md-6">
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Caption</th>
                        <th>Opsi</th>
y                </thead>
                <tbody>
                    @forelse ($slides as $i => $row)
                    <tr>
                        <td>{{ $row->caption }}</td>
                        <td>
                            <button wire:click='edit({{ $row->id }})' class="btn btn-sm btn-warning text-light"><i
                                    class="fa-solid fa-edit"></i></button>
                            <button wire:click='deleting({{ $row->id }})' class="btn btn-sm btn-danger"><i
                                    class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">Tidak ada data slide.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $slides->links() }}
        </div>
    </div>
    <div class="col-md-6">
        <h6 class="border-bottom mb-3"><i class="fa-solid fa-pen"></i>
            @if ($isEditing)
            Ubah Slide
            @else
            Buat Slide
            @endif
        </h6>
        <form wire:submit.prevent='{{ $isEditing ? 'update':'store' }}'>
            <div class="form-group">
                <label for="caption">Caption Slide</label>
                <input type="text" class="form-control @error('caption')
                    is-invalid
                @enderror" wire:model='caption' id="caption">
                @error('caption')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                    <label for="image">Gambar Slide</label>
                    <input type="file" class="form-control @error('image')
                                        is-invalid
                                    @enderror" id="image" wire:model='image'>
                    @error('image')
                    <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                
                @if ($image)
                <img style="width: 200px;" src="{{ $image->temporaryUrl() }}">
                @elseif ($isEditing && $oldImage)
                <img style="width: 200px;" src="{{ asset('storage/slides/'.$oldImage) }}">
                @endif
            <div class="btn btn-group float-right">
                <button wire:click='cancel' class="btn btn-danger" type="reset">Batal</button>
                <button class="btn btn-success" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div> --}}

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
