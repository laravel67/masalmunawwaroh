<div class="row">
    <!-- Sekolah Asal -->
    <div class="col-md-6">
        <x-input title="Sekolah Asal" name="sekolah_asal" placeholder="Masukkan Sekolah Asal"/>
    </div>

    <!-- Alamat Sekolah -->
    <div class="col-md-6">
        <x-input title="Alamat Sekolah" name="alamat_sekolah" placeholder="Masukkan Alamat Sekolah"/>
    </div>

    <!-- NPSN Sekolah -->
    <div class="col-md-6">
        <x-input type="text" title="NPSN Sekolah" name="npsn_sekolah" placeholder="Masukkan NPSN Sekolah"/>
    </div>

    <!-- NSM Sekolah (Opsional) -->
    <div class="col-md-6">
        <x-input type="text" title="NSM Sekolah (Opsional)" name="nsm_sekolah" placeholder="Masukkan NSM Sekolah (Opsional)"/>
    </div>

    <!-- Nomor Ijazah -->
    <div class="col-md-6">
        <x-input title="Nomor Ijazah" name="nomor_ijazah" placeholder="Masukkan Nomor Ijazah"/>
    </div>

    <!-- Nomor SKHU (Opsional) -->
    <div class="col-md-6">
        <x-input title="Nomor SKHU (Opsional)" name="nomor_skhu" placeholder="Masukkan Nomor SKHU (Opsional)"/>
    </div>

    <!-- Nomor Peserta UN (Opsional) -->
    <div class="col-md-6">
        <x-input title="Nomor Peserta Ujian Nasional" name="nomor_peserta_un" placeholder="Masukkan Nomor Peserta UN"/>
    </div>

    <hr class="col-12 my-3">

    <!-- Nilai Bahasa Indonesia -->
    <div class="col-md-3">
        <x-input type="number" title="Nilai Bahasa Indonesia" name="nilai_bahasa_indonesia" placeholder="Masukkan Nilai" min="0" max="100"/>
    </div>

    <!-- Nilai Matematika -->
    <div class="col-md-3">
        <x-input type="number" title="Nilai Matematika" name="nilai_matematika" placeholder="Masukkan Nilai" min="0" max="100"/>
    </div>

    <!-- Nilai IPA -->
    <div class="col-md-3">
        <x-input type="number" title="Nilai IPA" name="nilai_ipa" placeholder="Masukkan Nilai" min="0" max="100"/>
    </div>

    <!-- Nilai Bahasa Inggris -->
    <div class="col-md-3">
        <x-input type="number" title="Nilai Bahasa Inggris" name="nilai_bahasa_inggris" placeholder="Masukkan Nilai" min="0" max="100"/>
    </div>
</div>
