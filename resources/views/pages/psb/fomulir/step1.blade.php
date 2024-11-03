<div class="row">
    <!-- Nama Lengkap -->
    <div class="col-md-4">
        <x-input title="Nama Lengkap" name="nama_lengkap" placeholder="Nama Lengkap"/>
    </div>
    
    <!-- Nama Panggilan -->
    <div class="col-md-4">
        <x-input title="Nama Panggilan" name="nama_panggilan" placeholder="Nama Panggilan"/>
    </div>
    
    <!-- Tempat Lahir -->
    <div class="col-md-4">
        <x-input title="Tempat Lahir" name="tempat_lahir" placeholder="Tempat Lahir"/>
    </div>
    
    <!-- Tanggal Lahir -->
    <div class="col-md-4">
        <x-input type="date" title="Tanggal Lahir" name="tanggal_lahir" placeholder="Tanggal Lahir"/>
    </div>
    
    <!-- Alamat Asal -->
    <div class="col-md-4">
        <x-input title="Alamat Asal" name="alamat_asal" placeholder="Alamat Asal"/>
    </div>
    
    <!-- NISN -->
    <div class="col-md-4">
        <x-input type="number" title="NISN" name="nisn" placeholder="NISN"/>
    </div>
    
    <!-- Jenis Kelamin -->
    <div class="col-md-4">
        <x-input-select 
            title="Jenis Kelamin" 
            name="jenis_kelamin" 
            :defaultOptions="[['value' => 'Laki-laki', 'label' => 'Laki-laki'], ['value' => 'Perempuan', 'label' => 'Perempuan']]" 
        />
    </div>
    
    <!-- Anak Ke -->
    <div class="col-md-4">
        <x-input-select 
            title="Anak Ke-" 
            name="anak_ke" 
            :defaultOptions="array_map(fn($i) => ['value' => $i, 'label' => $i], range(1, 10))" 
        />
    </div>
    
    <!-- Jumlah Saudara -->
    <div class="col-md-4">
        <x-input type="number" title="Jumlah Saudara" name="jumlah_saudara" placeholder="Jumlah Saudara"/>
    </div>
    
    <!-- Penyakit Berat -->
    <div class="col-md-4">
        <x-input-select 
            title="Penyakit Berat" 
            name="penyakit_berat" 
            :defaultOptions="[['value' => 'Tidak Ada', 'label' => 'Tidak Ada'], ['value' => 'Ada', 'label' => 'Ada']]" 
        />
    </div>
    
    <!-- Berat Badan -->
    <div class="col-md-4">
        <x-input type="number" title="Berat Badan (kg)" name="berat_badan" placeholder="Berat Badan"/>
    </div>
    
    <!-- Tinggi Badan -->
    <div class="col-md-4">
        <x-input type="number" title="Tinggi Badan (cm)" name="tinggi_badan" placeholder="Tinggi Badan"/>
    </div>
    
    <!-- Golongan Darah -->
    <div class="col-md-4">
        <x-input-select 
            title="Golongan Darah" 
            name="golongan_darah" 
            :defaultOptions="[['value' => 'A', 'label' => 'A'], ['value' => 'B', 'label' => 'B'], ['value' => 'AB', 'label' => 'AB'], ['value' => 'O', 'label' => 'O']]" 
        />
    </div>
    
    <!-- Hobi -->
    <div class="col-md-4">
        <x-input type="text" title="Hobi" name="hobi" placeholder="Hobi"/>
    </div>
    
    <!-- Cita-cita -->
    <div class="col-md-4">
        <x-input type="text" title="Cita-cita" name="cita_cita" placeholder="Cita-cita"/>
    </div>
    
    <!-- Program Pilihan -->
    <div class="col-md-4">
        <x-input-select 
            title="Program Pilihan" 
            name="program_pilihan" 
            :defaultOptions="[['value' => 'Tahfidz', 'label' => 'Tahfidz'], ['value' => 'Umum', 'label' => 'Umum']]" 
        />
    </div>
</div>
