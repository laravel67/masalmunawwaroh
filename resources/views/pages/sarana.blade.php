<div class="row">
    <div class="col-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title d-flex">
            <x-btnAdd title="Sarana Prasarana" href="{{ route('asarana.create') }}"/>
                <div>
                    <x-btnImport id="importSarana" />
                    <x-modal-import subTitle="Sarana Prasarana" id="importSarana">
                        <form action="{{ route('import.sarana') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <x-input-import title="Import Data Sarpras" name="import">Pilih file Excel</x-input-import>
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
                        <th>{{ __('Gambar') }}</th>
                        <th>{{ __('Nama SP') }}</th>
                        <th>{{ _('Slug SP') }}</th>
                        <th>
                            {{ __('Opsi') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($saranas as $i=> $sarana)
                    <tr>
                        <td>
                            {{ $saranas->firstItem()+$i }}
                        </td>
                        <td>{{ $sarana->name }}</td>
                        <td>{{ $sarana->slug }}</td>
                        <td>
                            <x-btnAct>
                                <x-act title="Detail" href="{{ route('asarana.show', $sarana->slug) }}" icon="book-open" />
                                <x-act title="Ubah" href="{{ route('asarana.edit', $sarana->slug) }}" icon="edit" />
                                <x-act title="Hapus" model="deleting('{{ $sarana->slug }}')" icon="trash" />
                            </x-btnAct>
                        </td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            {!! $saranas->links() !!}
        </div>
      </div>
    </div>
</div>