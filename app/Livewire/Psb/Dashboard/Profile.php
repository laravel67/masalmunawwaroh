<?php

namespace App\Livewire\Psb\Dashboard;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[Title('Biodata')]
class Profile extends Component
{
    use WithFileUploads;

    public $no_pendaftaran, $nama_lengkap, $nama_panggilan, $tempat_lahir, $tanggal_lahir, $alamat_asal, $nisn;
    public $jenis_kelamin, $status_anak, $anak_ke, $jumlah_saudara, $penyakit_berat, $berat_badan;
    public $tinggi_badan, $golongan_darah, $hobi, $cita_cita, $program_pilihan;

    public $sekolah_asal, $alamat_sekolah, $npsn_sekolah, $nsm_sekolah;
    public $nomor_ijazah, $nomor_skhu, $nomor_peserta_un;
    public $nilai_bahasa_indonesia, $nilai_matematika, $nilai_ipa, $nilai_bahasa_inggris;

    public $nama_ayah, $tempat_lahir_ayah, $pendidikan_ayah, $pekerjaan_ayah, $no_hp_ayah, $alamat_ayah;
    public $nama_ibu, $tempat_lahir_ibu, $pendidikan_ibu, $pekerjaan_ibu, $no_hp_ibu, $alamat_ibu;

    public $email, $password, $photo, $oldPhoto, $registrationNumber, $password_confirmation;

    public function mount()
    {
        $this->loadStudent();
    }

    public function loadStudent()
    {
        $user_id = Auth::user()->id;

        $student = Student::where('user_id', $user_id)->first();
        
        if ($student) {
            $this->no_pendaftaran = $student->no_pendaftaran;
            $this->nama_lengkap = $student->nama_lengkap;
            $this->nama_panggilan = $student->nama_panggilan;
            $this->tempat_lahir = $student->tempat_lahir;
            $this->tanggal_lahir = $student->tanggal_lahir;
            $this->alamat_asal = $student->alamat_asal;
            $this->nisn = $student->nisn;
            $this->jenis_kelamin = $student->jenis_kelamin;
            $this->status_anak = $student->status_anak;
            $this->anak_ke = $student->anak_ke;
            $this->jumlah_saudara = $student->jumlah_saudara;
            $this->penyakit_berat = $student->penyakit_berat;
            $this->berat_badan = $student->berat_badan;
            $this->tinggi_badan = $student->tinggi_badan;
            $this->golongan_darah = $student->golongan_darah;
            $this->hobi = $student->hobi;
            $this->cita_cita = $student->cita_cita;
            $this->program_pilihan = $student->program_pilihan;

            // Data sekolah
            $this->sekolah_asal = $student->sekolah_asal;
            $this->alamat_sekolah = $student->alamat_sekolah;
            $this->npsn_sekolah = $student->npsn_sekolah;
            $this->nsm_sekolah = $student->nsm_sekolah;
            $this->nomor_ijazah = $student->nomor_ijazah;
            $this->nomor_skhu = $student->nomor_skhu;
            $this->nomor_peserta_un = $student->nomor_peserta_un;

            // Data nilai
            $this->nilai_bahasa_indonesia = $student->nilai_bahasa_indonesia;
            $this->nilai_matematika = $student->nilai_matematika;
            $this->nilai_ipa = $student->nilai_ipa;
            $this->nilai_bahasa_inggris = $student->nilai_bahasa_inggris;

            // Data orang tua
            $this->nama_ayah = $student->nama_ayah;
            $this->tempat_lahir_ayah = $student->tempat_lahir_ayah;
            $this->pendidikan_ayah = $student->pendidikan_ayah;
            $this->pekerjaan_ayah = $student->pekerjaan_ayah;
            $this->no_hp_ayah = $student->no_hp_ayah;
            $this->alamat_ayah = $student->alamat_ayah;

            $this->nama_ibu = $student->nama_ibu;
            $this->tempat_lahir_ibu = $student->tempat_lahir_ibu;
            $this->pendidikan_ibu = $student->pendidikan_ibu;
            $this->pekerjaan_ibu = $student->pekerjaan_ibu;
            $this->no_hp_ibu = $student->no_hp_ibu;
            $this->alamat_ibu = $student->alamat_ibu;
            $this->oldPhoto=$student->photo;
            $this->email = Auth::user()->email;
        }
    }

    public function render()
    {
        return view('pages.psb.dashboard.profile');
    }
}
