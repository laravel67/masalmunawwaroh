<div class="row">
    <div class="col-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            <x-btnAdd href="{{ route('acara.create') }}" title="Buat agenda"/>
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
                <th>{{ __('Nama Agenda dan agenda') }}</th>
                <th>{{ __('Kategori') }}</th>
                <th>{{ __('Tempat') }}</th>
                <th>{{ __('Waktu') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Aksi') }}</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($agendas as $i=> $agenda)
                <tr>
                  <td>{{ $agendas->firstItem()+$i }}</td>
                  <td>{{ $agenda->name }}</td>
                  <td>{{ $agenda->category }}</td>
                  <td>{{ $agenda->tempat }}</td>
                  <td>{{
                    \Carbon\Carbon::parse($agenda->waktu)->locale('id')->translatedFormat('d F
                    Y')}}
                  </td>
                  <td>
                    @if ($agenda->status==false)
                        <span class="text-muted">Menunggu</span>
                    @else
                        <span class="tetx-success">Selesai</span>
                    @endif
                  </td>
                  <td>
                    <x-btnAct>
                        <x-act title="Detail" href="{{ route('acara.show', $agenda->slug) }}" icon="book-open" />
                        <x-act title="Ubah" href="{{ route('acara.edit', $agenda->slug) }}" icon="edit" />
                        <x-act title="Hapus" model="deleting('{{ $agenda->slug }}')" icon="trash" />
                    </x-btnAct>
                  </td>
                </tr>
                @empty
                    <td>{{ __('Belum ada agenda.') }}</td>
                @endforelse
            </tbody>
          </table>
          <div class="m-2">
            {!! $agendas->links() !!}
          </div>
        </div>
      </div>
    </div>
</div>