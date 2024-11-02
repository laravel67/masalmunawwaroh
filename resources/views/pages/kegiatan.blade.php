<div class="row">
    <div class="col-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            <x-btnAdd href="{{ route('akegiatan.create') }}" title="Buat Kegiatan"/>
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
                <th>{{ __('Nama Kegiatan') }}</th>
                <th>{{ __('Dipublish') }}</th>
                <th>{{ __('Aksi') }}</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($kegiatans as $i=> $kegiatan)
                <tr>
                  <td>{{ $kegiatans->firstItem()+$i }}</td>
                  <td>{{ $kegiatan->name }}</td>
                  <td>{{
                    \Carbon\Carbon::parse($kegiatan->created_at)->locale('id')->translatedFormat('d F
                    Y')}}
                  </td>
                  <td>
                    <x-btnAct>
                        <x-act title="Detail Kegiatan" href="{{ route('akegiatan.show', $kegiatan->id) }}" icon="book-open" />
                        <x-act title="Ubah Kegiatan" href="{{ route('akegiatan.edit', $kegiatan->id) }}" icon="edit" />
                        <x-act title="Hapus Kegiatan" model="deleting('{{ $kegiatan->id }}')" icon="trash" />
                    </x-btnAct>
                  </td>
                </tr>
                @empty
                    <td>{{ __('Belum ada kegiatan.') }}</td>
                @endforelse
            </tbody>
          </table>
          <div class="m-2">
            {!! $kegiatans->links() !!}
          </div>
        </div>
      </div>
    </div>
</div>