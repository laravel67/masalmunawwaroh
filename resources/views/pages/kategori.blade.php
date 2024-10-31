<div class="row">
    <div class="col-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            <x-btnAdd title="Tambah Ketegori" href="{{ route('category.create') }}"/>
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
                <th>{{ __('Nama Kategori') }}</th>
                <th>{{ __('Slug Kateori') }}</th>
                <th>{{ __('Dibuat') }}</th>
                <th>{{ __('Aksi') }}</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($categories as $i=> $category)
                <tr>
                  <td>{{ $categories->firstItem()+$i }}</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->slug ?? '-' }}</td>
                  <td>{{
                    \Carbon\Carbon::parse($category->created_at)->locale('id')->translatedFormat('d F
                    Y')}}
                  </td>
                  <td>
                    <x-btnAct>
                        <x-act title="Ubah" href="{{ route('category.edit', $category->slug) }}" icon="edit" />
                        <x-act title="Hapus" model="deleting('{{ $category->slug }}')" icon="trash" />
                    </x-btnAct>
                  </td>
                </tr>
                @empty
                    <td>{{ __('Belum ada kategori berita.') }}</td>
                @endforelse
            </tbody>
          </table>
          <div class="m-2">
            {!! $categories->links() !!}
          </div>
        </div>
      </div>
    </div>
</div>