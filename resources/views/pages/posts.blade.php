<div class="row">
    <div class="col-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            <x-btnAdd href="{{ route('apost.create') }}" title="Buat Postingan"/>
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
                <th>{{ __('Judul Berita') }}</th>
                <th>{{ __('Kategori Berita') }}</th>
                <th>{{ __('Author') }}</th>
                <th>{{ __('Dipublish') }}</th>
                <th>{{ __('Aksi') }}</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($posts as $i=> $post)
                <tr>
                  <td>{{ $posts->firstItem()+$i }}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->category->name ?? '-' }}</td>
                  <td>{{ $post->author->name ?? '-' }}</td>
                  <td>{{
                    \Carbon\Carbon::parse($post->created_at)->locale('id')->translatedFormat('d F
                    Y')}}
                  </td>
                  <td>
                    <x-btnAct>
                        <x-act title="Detail Berita" href="{{ route('apost.show', $post->slug) }}" icon="book-open" />
                        <x-act title="Ubah Berita" href="{{ route('apost.edit', $post->slug) }}" icon="edit" />
                        <x-act title="Hapus Berita" model="deleting('{{ $post->slug }}')" icon="trash" />
                    </x-btnAct>
                  </td>
                </tr>
                @empty
                    <td>{{ __('Belum ada berita/artikel.') }}</td>
                @endforelse
            </tbody>
          </table>
          <div class="m-2">
            {!! $posts->links() !!}
          </div>
        </div>
      </div>
    </div>
</div>