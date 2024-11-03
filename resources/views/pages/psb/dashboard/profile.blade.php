<div class="card">
    <div class="card-header">
       <h3 class="text-center"> {{ __('CALON SISWA BARU') }}</h3>
    </div>
    <div class="card-body">
        <h4 class="text-center border-bottom p-1">
            <img src="{{ asset('mas/img/foto-guru.png') }}" alt="" srcset="" class="img-fluid" width="250">
        </h4>
        <form class="row justify-content-center">
            <div class="col-md-5">
                <h4 class="mb-3 text-success text-uppercase">{{ __('Data Siswa') }}</h4>
                <x-input type="text" title="Nomor Pendaftaran" name="no_pendaftaran" placeholder="Nomor Pendaftaran" readonly />
                <x-input title="Nama Lengkap" name="nama_lengkap" placeholder="Nama Lengkap"/>
                <x-input title="Nama Panggilan" name="nama_panggilan" placeholder="Nama Panggilan"/>
                <x-input title="Tempat Lahir" name="tempat_lahir" placeholder="Tempat Lahir"/>
                <x-input type="date" title="Tanggal Lahir" name="tanggal_lahir" placeholder="Tanggal Lahir"/>
                <x-input title="Alamat Asal" name="alamat_asal" placeholder="Alamat Asal"/>
                <x-input type="number" title="NISN" name="nisn" placeholder="NISN"/>
                <x-input-select title="Jenis Kelamin" name="jenis_kelamin" :defaultOptions="[['value' => 'Laki-laki', 'label' => 'Laki-laki'], ['value' => 'Perempuan', 'label' => 'Perempuan']]" />
                <x-input-select title="Anak Ke-" name="anak_ke" :defaultOptions="array_map(fn($i) => ['value' => $i, 'label' => $i], range(1, 10))" />
                <x-input type="number" title="Jumlah Saudara" name="jumlah_saudara" placeholder="Jumlah Saudara"/>
                <x-input-select title="Penyakit Berat" name="penyakit_berat" :defaultOptions="[['value' => 'Tidak Ada', 'label' => 'Tidak Ada'], ['value' => 'Ada', 'label' => 'Ada']]" />
                <x-input type="number" title="Berat Badan (kg)" name="berat_badan" placeholder="Berat Badan"/>
                <x-input type="number" title="Tinggi Badan (cm)" name="tinggi_badan" placeholder="Tinggi Badan"/>
                <x-input-select title="Golongan Darah" name="golongan_darah" :defaultOptions="[['value' => 'A', 'label' => 'A'], ['value' => 'B', 'label' => 'B'], ['value' => 'AB', 'label' => 'AB'], ['value' => 'O', 'label' => 'O']]" />
                <x-input type="text" title="Hobi" name="hobi" placeholder="Hobi"/>
                <x-input type="text" title="Cita-cita" name="cita_cita" placeholder="Cita-cita"/>
                <x-input-select title="Program Pilihan" name="program_pilihan" :defaultOptions="[['value' => 'Tahfidz', 'label' => 'Tahfidz'], ['value' => 'Umum', 'label' => 'Umum']]" />
                <hr>
                <x-input type="email" title="Alamat Email" name="email" placeholder="Masukkan Email" readonly />
            </div>
            <div class="col-md-6">
                <h4 class="mb-3 text-success text-uppercase">{{ __('Data Sekolah Asal') }}</h4>
                
                <x-input title="Sekolah Asal" name="sekolah_asal" placeholder="Masukkan Sekolah Asal"/>
                <x-input title="Alamat Sekolah" name="alamat_sekolah" placeholder="Masukkan Alamat Sekolah"/>
                <x-input type="text" title="NPSN Sekolah" name="npsn_sekolah" placeholder="Masukkan NPSN Sekolah"/>
                <x-input type="text" title="NSM Sekolah (Opsional)" name="nsm_sekolah" placeholder="Masukkan NSM Sekolah (Opsional)"/>
                <x-input title="Nomor Ijazah" name="nomor_ijazah" placeholder="Masukkan Nomor Ijazah"/>
                <x-input title="Nomor SKHU (Opsional)" name="nomor_skhu" placeholder="Masukkan Nomor SKHU (Opsional)"/>
                <x-input title="Nomor Peserta Ujian Nasional" name="nomor_peserta_un" placeholder="Masukkan Nomor Peserta UN"/>

                
                <hr class="my-3">
                <h4 class="mb-3 text-success text-uppercase">{{ __('Nilai Ujian Sekolah') }}</h4>
                <div class="row">
                    <div class="col-md-6">
                        <x-input type="number" title="Nilai Bahasa Indonesia" name="nilai_bahasa_indonesia" placeholder="Masukkan Nilai" min="0" max="100"/>
                    </div>
                    <div class="col-md-6">
                        <x-input type="number" title="Nilai Matematika" name="nilai_matematika" placeholder="Masukkan Nilai" min="0" max="100"/>
                    </div>
                    <div class="col-md-6">
                        <x-input type="number" title="Nilai IPA" name="nilai_ipa" placeholder="Masukkan Nilai" min="0" max="100"/>
                    </div>
                    <div class="col-md-6">
                        <x-input type="number" title="Nilai Bahasa Inggris" name="nilai_bahasa_inggris" placeholder="Masukkan Nilai" min="0" max="100"/>
                    </div>
                </div>
                <hr class="my-3">              
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-success text-uppercase">{{ __('Data Ayah') }}</h4>
                        <x-input title="Nama Ayah" name="nama_ayah" placeholder="Masukkan Nama Ayah" wire:model="nama_ayah" />
                        <x-input title="Tempat Lahir Ayah" name="tempat_lahir_ayah" placeholder="Masukkan Tempat Lahir Ayah" wire:model="tempat_lahir_ayah" />
                        <x-input title="Pendidikan Ayah" name="pendidikan_ayah" placeholder="Masukkan Pendidikan Terakhir Ayah" wire:model="pendidikan_ayah" />
                        <x-input title="Pekerjaan Ayah" name="pekerjaan_ayah" placeholder="Masukkan Pekerjaan Ayah" wire:model="pekerjaan_ayah" />
                        <x-input title="Nomor HP Ayah" name="no_hp_ayah" placeholder="Masukkan Nomor HP Ayah" wire:model="no_hp_ayah" />
                        <x-input title="Alamat Ayah" name="alamat_ayah" placeholder="Masukkan Alamat Ayah" wire:model="alamat_ayah" />
                    </div>
                    <div class="col-md-6">
                        <h4 class="text-success text-uppercase">{{ __('Data Ibu') }}</h4>
                        <x-input title="Nama Ibu" name="nama_ibu" placeholder="Masukkan Nama Ibu" wire:model="nama_ibu" />
                        <x-input title="Tempat Lahir Ibu" name="tempat_lahir_ibu" placeholder="Masukkan Tempat Lahir Ibu" wire:model="tempat_lahir_ibu" />
                        <x-input title="Pendidikan Ibu" name="pendidikan_ibu" placeholder="Masukkan Pendidikan Terakhir Ibu" wire:model="pendidikan_ibu" />
                        <x-input title="Pekerjaan Ibu" name="pekerjaan_ibu" placeholder="Masukkan Pekerjaan Ibu" wire:model="pekerjaan_ibu" />
                        <x-input title="Nomor HP Ibu" name="no_hp_ibu" placeholder="Masukkan Nomor HP Ibu" wire:model="no_hp_ibu" />
                        <x-input title="Alamat Ibu" name="alamat_ibu" placeholder="Masukkan Alamat Ibu" wire:model="alamat_ibu" />
                    </div>
                </div>
                <x-input title="Upload Foto" type="file" name="photo"/>
                @if ($oldPhoto)
                    <img src="{{ asset('storage/' . $oldPhoto) }}" alt="Old Photo" class="img-fluid" width="200">
                @elseif ($photo)
                    <img src="{{ $photo->temporaryUrl() }}" alt="Uploaded Photo" class="img-fluid" width="200">
                @endif
            </div> 
        </form>
    </div>
</div>
