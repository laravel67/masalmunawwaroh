<x-main>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              {{ __('Tambah Data Guru') }}
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-input title="Nama Guru" type="text" name="name" value="{{ old('name') }}"/>
                    <x-input title="Slug Nama" type="text" name="slug" value="{{ old('slug') }}" readonly/>
                    <x-input title="Pendidikan" type="text" name="pendidikan" value="{{ old('pendidikan') }}"/>
                    <x-input title="Mulai Mengajar" type="date" name="mulai_mengajar" value="{{ old('mulai_mengajar') }}"/>
                    <x-input title="Guru Mata Pelajaran" type="text" name="guru_mapel" value="{{ old('guru_mapel') }}"/>
                    <x-input title="Jabatan" type="text" name="jabatan" value="{{ old('jabatan') }}"/>
                    {{-- <div class="form-group">
                        <label for="mapel_id">{{ __('Guru Mata Pelajaran') }}</label>
                        <select type="text" class="form-control mapels @error('mapel_id') is-invalid @enderror"
                            name="mapel_id[]" id="mapel_id" multiple="multiple">
                            @foreach ($mapels as $mapel)
                            <option value="{{ $mapel->id }}" {{ in_array($mapel->id, old('mapel_id', [])) ? 'selected' : '' }}>
                                {{ $mapel->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('mapel_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    {{-- <div class="form-group">
                        <label for="jabatan_id">{{ __('Jabatan') }}</label>
                        <select type="text" class="form-control mapels @error('jabatan_id') is-invalid @enderror" name="jabatan_id[]"
                            id="jabatan_id" multiple="multiple">
                            @foreach ($jabatans as $jabatan)
                            <option value="{{ $jabatan->id }}" {{ in_array($jabatan->id, old('jabatan_id', [])) ? 'selected' : '' }}>
                                {{ $jabatan->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('jabatan_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    <x-input-text-area name="biografi" title="Biografi Singkat" value="{{ old('biografi') }}" width="200"/>
                    <x-input type="file" name="image" title="Unggah Foto" onchange="previewImage()" accept="image/*"/>
                    <x-btn-form/>
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
    @include('dashboard.teachers.script')
</x-main>