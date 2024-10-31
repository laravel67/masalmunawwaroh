{{-- <div class="row">
    <div class="col-md-7">
        <div class="d-flex justify-content-between mb-3">
            <div class="d-flex">
                <x-btn-add href="{{ route('asarana.create') }}">{{ __('Sarana Prasarana') }}</x-btn-add>
                <div>
                    <x-btnImport id="importSarana" />
                    <x-modal-import subTitle="Sarana Prasarana" id="importSarana">
                        <form action="{{ route('import.sarana') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <x-input-import name="import">Pilih file Excel</x-input-import>
                            <x-btn-import />
                        </form>
                    </x-modal-import>
                </div>
            </div>
            <x-search></x-search>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama SP</th>
                        <th>Slug SP</th>
                        <th>
                            Opsi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($saranas as $i=> $sarana)
                    <tr class=" ">
                        <td>
                            @if ($sarana->image)
                            <img src="{{ asset('storage/'.$sarana->image) }}" class=" rounded-circle" width="50"
                                height="50">
                            @else
                            <img class="rounded-circle"
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                                alt="Generic placeholder image" width="50" height="50">
                            @endif
                        </td>
                        <td>{{ $sarana->name }}</td>
                        <td>{{ $sarana->slug }}</td>
                        <td>
                            <div class="btn btn-group">
                                <x-btn-action href="{{ route('asarana.show', $sarana->slug) }}" color="success">
                                    {{ __('eye') }}
                                </x-btn-action>
                                <x-btn-action href="{{ route('asarana.edit', $sarana->slug) }}" color="warning">
                                    {{ __('edit') }}
                                </x-btn-action>
                                <x-btn-action model="deleting('{{ $sarana->slug }}')" color="danger">
                                    {{ __('trash') }}
                                </x-btn-action>
                            </div>
                        </td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            {!! $saranas->links() !!}
        </div>
    </div>
    <div class="col-md-3 d-none d-md-flex">
        <img src="{{ asset('backend/img/undraw_designer_girl_re_h54c.svg') }}" class="img-fluid">
    </div>
</div> --}}
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
                                <x-act title="Detail Prestasi" href="{{ route('asarana.show', $sarana->slug) }}" icon="book-open" />
                                <x-act title="Ubah Prestasi" href="{{ route('asarana.edit', $sarana->slug) }}" icon="edit" />
                                <x-act title="Hapus Prestasi" model="deleting('{{ $sarana->slug }}')" icon="trash" />
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