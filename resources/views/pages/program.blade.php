<div class="row">
    <div class="col-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            <x-btnAdd href="{{ route('aprogram.create') }}" title="Tambah Program Unggulan"/>
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
                <th>{{ __('Nama Program') }}</th>
                <th>{{ __('Nama Alias') }}</th>
                <th>{{ __('Aksi') }}</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($programs as $i=> $program)
                <tr>
                  <td>{{ $programs->firstItem()+$i }}</td>
                  <td>
                    <img width="100" class="img-fluid" src="{{ $program->image ? asset('storage/' . $program->image) : asset('backend/img/no-image.svg') }}" alt="{{ $program->name ?? 'No Image Available' }}" />
                  </td>
                  <td>{{ $program->name }}</td>
                  <td>{{ $program->alias }}</td>
                  <td>
                    <x-btnAct>
                        <x-act title="Detail Program" href="{{ route('aprogram.show', $program->slug) }}" icon="book-open" />
                        <x-act title="Ubah Program" href="{{ route('aprogram.edit', $program->slug) }}" icon="edit" />
                        <x-act title="Hapus Program" model="deleting('{{ $program->slug }}')" icon="trash" />
                    </x-btnAct>
                  </td>
                </tr>
                @empty
                    <td>{{ __('Belum ada program unggulan.') }}</td>
                @endforelse
            </tbody>
          </table>
          <div class="m-2">
            {!! $programs->links() !!}
          </div>
        </div>
      </div>
    </div>
</div>