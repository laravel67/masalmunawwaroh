<x-main>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              {{ __('Buat berita/Artikel') }}
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <form action="{{ route('apost.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                  <x-input type="text" title="Judul Berita" name="title" value="{{ old('title', $post->title) }}" />
                  <x-input type="text" title="Slug Berita" name="slug" value="{{ old('title', $post->slug) }}" readonly/>
                  <x-input-select title="Kategori" name="category_id" :options="$categories" :selected="old('category_id', $post->category_id)" />
                  <x-input-text-area width="400" name="body" title="Isi Berita/Artikel" value="{{ old('body', $post->body) }}"/>
                  <x-input type="file" title="Image/Gambar" name="image"  onchange="previewImage()" accept="image/*"/>
                  <x-btn-form/>
                  <img id="previewContainer" class="mt-3 img-fluid" width="300">
                  @if ($post->image)
                    <img id="previewContainer" src="{{ asset('storage/'.$post->image) }}" class="mt-3 img-fluid"
                        width="300">
                    @endif
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.col-->
    </div>
    @include('dashboard.posts.post-js')
  </x-main>