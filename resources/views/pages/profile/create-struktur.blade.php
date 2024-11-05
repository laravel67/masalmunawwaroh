<div class="row">
    <div class="col-md-4">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{ !$isEditing ? 'Tambah Struktur':'Ubah Struktur' }}</h3>
        </div>
        <div class="card-body">
            <form wire:submit="{{ $isEditing ? 'update':'store' }}" >
                <x-input type="text" title="Masa Jabatan" name="periode" placeholder="contoh 2024-2025"/>
                <x-input type="file" title="Gambar Struktur" name="image"/>
                <div class="btn-group float-right">
                  <button wire:click='cancel' type="button" class="btn btn-danger">{{ __('Batal') }}</button>
                  <button type="submit" class="btn btn-success">{{ __('Simpan') }}</button>
              </div>
                <img src="{{ $image ? $image->temporaryUrl() : asset('storage/'.$oldImage) }}" alt="" srcset="" class="img-fluid">
            </form>
        </div>
      </div>
    </div>
    <!-- /.col -->
    <div class="col-md-8">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">{{ __('Daftar Struktur') }}</h3>

        </div>
        <div class="card-body p-0">
          <div class="table-responsive mailbox-messages">
            <table class="table">
              <thead>
                  <tr>
                      <th>{{ __('Gambar Struktur') }}</th>
                      <th>{{ __('Masa Jabatan') }}</th>
                      <th>{{ __('Aksi') }}</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse ($strukturs as $struktur)
                      <tr>
                          <td>
                              <img src="{{ asset('storage/'. $struktur->image) }}" alt="Struktur Image">
                          </td>
                          <td>{{ $struktur->periode }}</td>
                          <td>
                            <x-btnAct>
                              <x-act title="Ubah" model="edit('{{ $struktur->id }}')" icon="edit" />
                              <x-act title="Hapus" model="deleting('{{ $struktur->id }}')" icon="trash" />
                          </x-btnAct>
                          </td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="2" class="text-center">{{ __('Data tidak tersedia') }}</td>
                      </tr>
                  @endforelse
              </tbody>
          </table>          
          </div>
        </div>
      </div>
    </div>
  </div>