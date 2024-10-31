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
              <form action="{{ route('apost.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-input type="text" title="Judul Berita" name="title" value="{{ old('title') }}" />
                <x-input type="text" title="Slug Berita" name="slug" value="{{ old('slug') }}" readonly/>
                <x-input-select  title="Kategori" name="category_id" :options="$categories" />
                <x-input-text-area width="400" name="body" value="{{ old('body') }}" title="Isi Berita/Artikel"/>
                <x-input type="file" title="Image/Gambar" name="image"  onchange="previewImage()" accept="image/*"/>
                <x-btn-form></x-btn-form>
                <img id="previewContainer" class="mt-3 img-fluid" width="300">
              </form>
            </div>
            <x-image-draw/>
          </div>
        </div>
      </div>
    </div>
    <!-- /.col-->
  </div>
  @include('dashboard.posts.post-js')
</x-main>