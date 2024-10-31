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

                        <div class="form-group">
                            <label for="mapel_id">{{ __('Guru Mapel') }}</label>
                            <select class="form-control mapels @error('mapel_id') is-invalid @enderror" name="mapel_id[]"
                                id="mapel_id" multiple="multiple">
                                @foreach ($mapels as $mapel)
                                <option value="{{ $mapel->id }}" {{ in_array($mapel->id, old('mapel_id',
                                    $guru->mapels->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{ $mapel->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('mapel_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="jabatan_id">{{ __('Jabatan') }}</label>
                            <select class="form-control mapels @error('jabatan_id') is-invalid @enderror" name="jabatan_id[]" id="jabatan_id"
                                multiple="multiple">
                                @foreach ($jabatans as $jabatan)
                                <option value="{{ $jabatan->id }}" {{ in_array($jabatan->id, old('jabatan_id',
                                    $guru->jabatans->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{ $jabatan->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('jabatan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    <x-input-text-area name="deskripsi" title="Biografi Singkat" value="{!! old('deskripsi', $guru->deskripsi) !!}" width="200"/>
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