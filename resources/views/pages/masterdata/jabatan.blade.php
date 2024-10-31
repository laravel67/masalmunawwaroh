<div class="row">
    <div class="col-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            <div>
                <x-btnImport id="importJabatan" />
                <x-modal-import subTitle="Import Jabatan" id="importJabatan">
                    <form action="{{ route('import.jabatan') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-input-import name="import" title="Pilih file Excel"/>
                        <x-btn-import />
                    </form>
                </x-modal-import>
            </div>
          </h3>
          <div class="card-tools">
            <x-search/>
          </div>
        </div>
        <div class="card-body table-responsive p-0">
            <div class="row d-flex justify-content-between px-md-2">
                <div class="col-md-6">
                    <table class="table table-hover text-nowrap">
                      <thead>
                        <tr>
                          <th>{{ __('No') }}</th>
                          <th>{{ __('Nama Jabatan') }}</th>
                          <th>{{ __('Aksi') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                          @forelse ($jabatan as $i=> $row)
                          <tr>
                            <td>{{ $jabatan->firstItem()+$i }}</td>
                            <td>{{ $row->name }}</td>
                            <td>
                              <x-btnAct>
                                  <x-act title="Ubah" model="edit('{{ $row->id }}')" icon="edit" />
                                  <x-act title="Hapus" model="deleting('{{ $row->id }}')" icon="trash" />
                              </x-btnAct>
                            </td>
                          </tr>
                          @empty
                              <td>{{ __('Belum ada data jabatan.') }}</td>
                          @endforelse
                      </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <h3 class="card-title">{{ !$isEditing ? 'Tambah Jabatan':'Ubah Jabatan' }}</h3>
                    <br>
                    <form wire:submit='{{ $isEditing ? ' update':'store' }}'>
                        <x-input name="name" title="Nama Jabatan"  />
                        <div class="btn-group float-right">
                            <button wire:click='cancel' type="button" class="btn btn-danger">{{ __('Batal') }}</button>
                            <button type="submit" class="btn btn-success">{{ __('Simpan') }}</button>
                        </div>
                    </form>
                </div>
            </div>
          <div class="m-2">
            {!! $jabatan->links() !!}
          </div>
        </div>
      </div>
    </div>
</div>
