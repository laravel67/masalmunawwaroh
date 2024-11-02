<x-main>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              {{ __('Ubah Data Guru') }}
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <form action="{{ route('guru.update', $guru->slug) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <x-input title="Nama Guru" type="text" name="name" value="{{ old('name',$guru->name) }}"/>
                    <x-input title="Slug Nama" type="text" name="slug" value="{{ old('slug',$guru->slug) }}" readonly/>
                    <x-input title="Pendidikan" type="text" name="pendidikan" value="{{ old('pendidikan',$guru->pendidikan) }}"/>
                    <x-input title="Mulai Mengajar" type="date" name="mulai_mengajar" value="{{ old('mulai_mengajar',$guru->mulai_mengajar) }}"/>
                    <x-input title="Guru Mata Pelajaran" type="text" name="guru_mapel" value="{{ old('guru_mapel',$guru->guru_mapel) }}"/>
                    <x-input title="Jabatan" type="text" name="jabatan" value="{{ old('jabatan',$guru->jabatan) }}"/>
                    <x-input-text-area name="biografi" title="Biografi Singkat" value="{!! old('biografi', $guru->biografi) !!}" width="200"/>
                    <x-input type="file" name="image" title="Unggah Foto" onchange="previewImage()" accept="image/*"/>
                    <x-btn-form/>
                    @if ($guru->image)
                        <img id="previewContainer" src="{{ asset('storage/'.$guru->image) }}" class="mt-3 img-fluid" width="300" alt="{{ $guru->name }}">
                    @else
                        <img id="previewContainer" class="mt-3 img-fluid" width="300" alt="{{ __('No image available') }}">
                    @endif
                </form>
              </div>
              <x-image-draw/>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('dashboard.teachers.script')
</x-main>