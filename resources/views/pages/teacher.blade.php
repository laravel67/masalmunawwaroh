<div class="row">
    <div class="col-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            <x-btnAdd href="{{ route('guru.create') }}" title="Tambah Guru"/>
            <x-btnImport id="importGuru" />
            <x-modal-import subTitle="Import Guru" id="importGuru">
                <form action="{{ route('import.guru') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-input-import title="Import Data Guru" name="import">{{ __('Pilih file Excels') }}</x-input-import>
                    <x-btn-import />
                </form>
            </x-modal-import>
          </h3>
          <div class="card-tools">
            <x-search/>
          </div>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Gambar') }}</th>
                <th>{{ __('Nama Guru') }}</th>
                <th>{{ __('Pendidikan Terakhir') }}</th>
                <th>{{ __('Mulai Mengajar') }}</th>
                <th>{{ __('Aksi') }}</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($teachers as $i=> $guru)
                <tr>
                  <td>{{ $teachers->firstItem()+$i }}</td>
                  <td>
                        @if ($guru->image)
                        <img src="{{ asset('storage/'.$guru->image) }}" class=" rounded-circle" width="50" height="50">
                        @else
                        <img src="{{ asset('mas/img/foto-guru.png') }}" class=" rounded-circle" width="50" height="50">
                        @endif
                  </td>
                  <td>{{ $guru->name }}</td>
                  <td>{{ $guru->pendidikan }}</td>
                  <td>{{
                    \Carbon\Carbon::parse($guru->mulai_mengajar)->locale('id')->translatedFormat('d F
                    Y')}}
                  </td>
                  <td>
                    <x-btnAct>
                        <x-act title="Detail Guru" href="{{ route('guru.show', $guru->slug) }}" icon="book-open" />
                        <x-act title="Ubah Guru" href="{{ route('guru.edit', $guru->slug) }}" icon="edit" />
                        <x-act title="Hapus Guru" model="deleting('{{ $guru->slug }}')" icon="trash" />
                    </x-btnAct>
                  </td>
                </tr>
                @empty
                    <td>{{ __('Belum ada data guru.') }}</td>
                @endforelse
            </tbody>
          </table>
          <div class="m-2">
            {!! $teachers->links() !!}
          </div>
        </div>
      </div>
    </div>
</div>