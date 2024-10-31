<div class="row">
    <div class="col-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title d-flex">
            <x-btnAdd title="Tambah Prestasi" href="{{ route('prestasi.create') }}"/>
                <div>
                    <x-btnImport id="importPrestasi" />
                    <x-modal-import subTitle="Prestasi/Penghargaan" id="importPrestasi">
                        <form action="{{ route('import.prestasi') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <x-input-import name="import">Pilih file Excel</x-input-import>
                            <x-btn-import />
                        </form>
                    </x-modal-import>
                </div>
          </h3>
          <div class="card-tools">
            <x-search/>
          </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>{{ __('No.') }}</th>
                        <th>{{ __('Nama Prestasi') }}</th>
                        <th>{{ __('Kategori') }}</th>
                        <th>
                            {{ __('Opsi') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($achievments as $i=> $achievment)
                    <tr>
                        <td>
                            {{ $achievments->firstItem()+$i }}
                        </td>
                        <td>{{ $achievment->title }}</td>
                        <td>{{ $achievment->category }}</td>
                        <td>
                            <x-btnAct>
                                <x-act title="Detail Prestasi" href="{{ route('prestasi.show', $achievment->slug) }}" icon="book-open" />
                                <x-act title="Ubah Prestasi" href="{{ route('prestasi.edit', $achievment->slug) }}" icon="edit" />
                                <x-act title="Hapus Prestasi" model="deleting('{{ $achievment->slug }}')" icon="trash" />
                            </x-btnAct>
                        </td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            {!! $achievments->links() !!}
        </div>
      </div>
    </div>
</div>