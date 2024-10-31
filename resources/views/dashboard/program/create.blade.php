<x-main>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              {{ __('Tambah program unggulan') }}
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <form action="{{ route('aprogram.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <x-input type="text" title="Nama Program" name="name" value="{{ old('name') }}" />
                  <x-input type="text" title="Slug Program" name="slug" value="{{ old('slug') }}" readonly/>
                  <x-input type="text" title="Nama Alias Program" name="alias" value="{{ old('alias') }}"/>
                  {{-- <x-input-select title="Kategori" name="category_id" :options="$categories" /> --}}
                  <x-input-text-area width="400" name="body" title="Deskripsi Program"/>
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
    @include('dashboard.program.js')
  </x-main>