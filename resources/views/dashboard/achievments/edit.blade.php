<x-main>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        {{ __('Ubah Prestasi') }}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form action="{{ route('prestasi.update', $prestasi->slug) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <x-input type="text" name="title" title="Nama Prestasi" value="{{ old('title', $prestasi->title) }}"/>
                                <x-input type="text" name="slug" title="Slug Prestasi" readonly value="{{ old('slug', $prestasi->slug) }}"/>
                                    <x-input-select title="Tingkat" name="tingkat" :selected="old('tingkat', $prestasi->tingkat)" :defaultOptions="[
                                        ['value' => 'Internasional', 'label' => 'Internasional'],
                                        ['value' => 'Nasional', 'label' => 'Nasional'],
                                        ['value' => 'Provinsi', 'label' => 'Provinsi'],
                                        ['value' => 'Kabupaten', 'label' => 'Kabupaten'],
                                        ['value' => 'Kecamatan', 'label' => 'Kecamatan'],
                                        ['value' => 'Desa', 'label' => 'Desa'],
                                        ['value' => 'Sekolah', 'label' => 'Sekolah'],
                                    ]"/>
                                
                                <x-input-select title="Kategori Prestasi" name="category" :selected="old('category', $prestasi->category)" :defaultOptions="[
                                    ['value' => 'akademik', 'label' => 'Akademik'],
                                    ['value' => 'nonakademik', 'label' => 'Non Akademik'],
                                    ['value' => 'siswa', 'label' => 'Santri/Siswa']
                                ]"/>
                                
                                <x-input-text-area name="body" width="200" title="Deskripsi" value="{!! old('body', $prestasi->body) !!}"/>
                                <x-input name="image" type="file" title="Gambar/Dokumen" onchange="previewImage()" accept="image/*"/>
                                
                                <x-btn-form/>
                                
                                @if ($prestasi->image)
                                    <img id="previewContainer" src="{{ asset('storage/'.$prestasi->image) }}" class="mt-3 img-fluid" width="300" alt="{{ $prestasi->title }}">
                                @else
                                    <img id="previewContainer" class="mt-3 img-fluid" width="300" alt="No Image Available">
                                @endif
                            </form>
                        </div>
                        <x-image-draw/>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    @include('dashboard.achievments.script')
</x-main>
