<x-main>
    <form action="{{ route('appdb.update', $student->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="my-3 p-3 bg-white rounded shadow-sm rounded-0">
            <h6 class="border-bottom border-gray pb-2 mb-0"><i class="fa-solid fa-user-tie"></i> Ubah Data</h6>
            <div class="row justify-content-center mt-2">
                @if ($student->image)
                    <img class="img-thumbnail" src="{{ asset('storage/'.$student->image) }}" width="200" height="200">
                @else
                    <img id="previewContainer" class="img-thumbnail" src="{{ asset('frontend/img/user.svg') }}" width="200" height="200">
                @endif
            </div>
            <div class="row">
                <div class="col-md">
                    <x-input title="NIK" name="nik" type="number" icon="fa-address-card" :value="old('nik', $student->nik)" />
                    <x-input title="Nama Lengkap" name="nama" type="text" icon="fa-user-tie" :value="old('nama', $student->nama)" />
                    <x-input title="Umur" name="umur" type="number" icon="fa-digital-ocean" :value="old('umur', $student->umur)" />
                    <x-input title="Tempat Lahir" name="tempat_lahir" type="text" icon="fa-map-location-dot" :value="old('tempat_lahir', $student->tempat_lahir)" />
                    <x-input title="Tanggal Lahir" name="tanggal_lahir" type="date" icon="fa-calendar-days" :value="old('tanggal_lahir', $student->tanggal_lahir)" />
                    
                    <x-input-select title="Jenis Kelamin" name="jenis_kelamin" 
                        :options="[]" 
                        :defaultOptions="[['value' => 'L', 'label' => 'Laki-laki'], ['value' => 'P', 'label' => 'Perempuan']]" 
                        :selected="old('jenis_kelamin', $student->jenis_kelamin)" 
                        icon="fa-venus-mars" />
            
                    <x-input title="Nomor Peserta Ujian" name="npu" type="number" icon="fa-globe" :value="old('npu', $student->npu)" />
                    <x-input title="NISN" name="nisn" type="number" icon="fa-earth-asia" :value="old('nisn', $student->nisn)" />
                    <x-input title="Tahun Kelulusan" name="tahun_lulus" type="number" icon="fa-user-graduate" :value="old('tahun_lulus', $student->tahun_lulus)" />
                </div>
                
                <div class="col-md">
                    <!-- Nama Orang Tua -->
                    <x-input title="Nama Ayah" name="nama_ayah" :value="old('nama_ayah', $student->nama_ayah)" type="text" />
                    <x-input title="Nama Ibu" name="nama_ibu" :value="old('nama_ibu', $student->nama_ibu)" type="text" />
                    
                    <!-- NIK Orang Tua -->
                    <x-input title="NIK Ayah" name="nik_ayah" :value="old('nik_ayah', $student->nik_ayah)" type="number" />
                    <x-input title="NIK Ibu" name="nik_ibu" :value="old('nik_ibu', $student->nik_ibu)" type="number" />
                    
                    <!-- Nomor Telepon/Whatsapp Orang Tua -->
                    <x-input title="Nomor Telepon/Whatsapp" name="kontak" :value="old('kontak', $student->kontak)" type="text" />
                    
                    <!-- Asal Sekolah -->
                    <x-input title="Asal Sekolah" name="asal_sekolah" :value="old('asal_sekolah', $student->asal_sekolah)" type="text" />
                    
                    <!-- Status -->
                    <x-input-select title="Status" name="status" 
                        :options="[]" 
                        :defaultOptions="[['value' => 'baru', 'label' => 'Siswa/Santri Baru'], ['value' => 'pindahan', 'label' => 'Siswa/Santri Pindahan']]" 
                        :selected="old('status', $student->status)" />
                    
                    <!-- Jenjang -->
                    <x-input-select title="Jenjang" name="jenjang" 
                        :options="[]" 
                        :defaultOptions="[['value' => 'ma', 'label' => 'Madrasah Aliyah'], ['value' => 'mts', 'label' => 'Madrasah Tsanawiyah']]" 
                        :selected="old('jenjang', $student->jenjang)" />
                    
                    <!-- Kelas -->
                    <x-input-select title="Kelas" name="kelas" 
                        :options="[]" 
                        :defaultOptions="[['value' => 'I', 'label' => 'I'], ['value' => 'II', 'label' => 'II'], ['value' => 'III', 'label' => 'III']]" 
                        :selected="old('kelas', $student->kelas)" />
                    
                    <!-- Alamat Email -->
                    <x-input title="Alamat Email" name="email" :value="old('email', $student->email)" type="email" />
                    
                    <!-- Upload Foto -->
                    <div class="d-flex align-items-center mb-3">
                        <label class="text-gray-dark mr-2">Upload Foto</label>
                        <input type="hidden" name="oldImage" value="{{ $student->image }}">
                        <input type="file" name="image" id="image" class="@error('image') is-invalid @enderror" onchange="previewImage()">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="text-right">
                        <a href="{{ route('appdb.index') }}" class="btn btn-sm btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-sm btn-success">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @include('dashboard.ppdb.script')
</x-main>
