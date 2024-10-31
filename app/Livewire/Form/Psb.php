<?php

namespace App\Livewire\Form;

use App\Models\Taj;
use App\Models\User;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Psb extends Component
{
    use WithFileUploads;

    public $step = 1;
    public $titleForm='Data Siswa';
    public $taId;

    public $nama_lengkap, $nama_panggilan, $tempat_lahir, $tanggal_lahir, $alamat_asal, $nisn;
    public $jenis_kelamin, $status_anak, $anak_ke, $jumlah_saudara, $penyakit_berat, $berat_badan;
    public $tinggi_badan, $golongan_darah, $hobi, $cita_cita, $program_pilihan;

    public $sekolah_asal, $alamat_sekolah, $npsn_sekolah, $nsm_sekolah;
    public $nomor_ijazah, $nomor_skhu, $nomor_peserta_un;
    public $nilai_bahasa_indonesia, $nilai_matematika, $nilai_ipa, $nilai_bahasa_inggris;

    public $nama_ayah, $tempat_lahir_ayah, $pendidikan_ayah, $pekerjaan_ayah, $no_hp_ayah, $alamat_ayah;
    public $nama_ibu, $tempat_lahir_ibu, $pendidikan_ibu, $pekerjaan_ibu, $no_hp_ibu, $alamat_ibu;

    public $email, $password, $photo, $registrationNumber, $password_confirmation;
    
    protected $rules = [
        'nama_lengkap' => 'required|string|max:255',
        'nama_panggilan' => 'required|string|max:50',
        'tempat_lahir' => 'required|string|max:100',
        'tanggal_lahir' => 'required|date',
        'alamat_asal' => 'required|string',
        'nisn' => 'required|numeric|digits:10|unique:students,nisn',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'anak_ke' => 'required|numeric|min:1',
        'jumlah_saudara' => 'required|numeric|min:0',
        'penyakit_berat' => 'nullable|string|max:100',
        'berat_badan' => 'required|numeric|min:1',
        'tinggi_badan' => 'required|numeric|min:1',
        'golongan_darah' => 'required|in:A,B,AB,O',
        'hobi' => 'required|string|max:100',
        'cita_cita' => 'required|string|max:100',
        'program_pilihan' => 'required|in:Tahfidz,Umum',

        // Step2 
        'sekolah_asal' => 'required|string|max:255',
        'alamat_sekolah' => 'required|string|max:255',
        'npsn_sekolah' => 'required|numeric|digits:8',
        'nsm_sekolah' => 'nullable|string|max:10',
        'nomor_ijazah' => 'required|string|max:20',
        'nomor_skhu' => 'nullable|string|max:20',
        'nomor_peserta_un' => 'nullable|string|max:20',
        'nilai_bahasa_indonesia' => 'required|numeric|min:0|max:100',
        'nilai_matematika' => 'required|numeric|min:0|max:100',
        'nilai_ipa' => 'required|numeric|min:0|max:100',
        'nilai_bahasa_inggris' => 'required|numeric|min:0|max:100',

        // step3
        'nama_ayah' => 'required|string|max:255',
        'tempat_lahir_ayah' => 'required|string|max:100',
        'pendidikan_ayah' => 'required|string|max:50',
        'pekerjaan_ayah' => 'required|string|max:100',
        'no_hp_ayah' => 'required|numeric|digits_between:10,15',
        'alamat_ayah' => 'required|string|max:255',

        'nama_ibu' => 'required|string|max:255',
        'tempat_lahir_ibu' => 'required|string|max:100',
        'pendidikan_ibu' => 'required|string|max:50',
        'pekerjaan_ibu' => 'required|string|max:100',
        'no_hp_ibu' => 'required|numeric|digits_between:10,15',
        'alamat_ibu' => 'required|string|max:255',
        // 'photo' => 'required|image|max:1024',

        // Step 4
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',

    ];

    protected $messages = [
        'required' => ':attribute wajib diisi.',
        'numeric' => ':attribute harus berupa angka.',
        'in' => ':attribute tidak valid.',
        'unique' => ':attribute sudah terdaftar.',
        'digits' => ':attribute harus :digits angka.',
        'max' => ':attribute maksimal :max karakter.',
    ];

    public $validatedSteps = [
        'step1' => false,
        'step2' => false,
        'step3' => false,
        'step4' => false,
        'step5' => false,

    ];

    public function mount()
    {
        $this->generateRegistrationNumber();
    }
    
    public function generateRegistrationNumber()
    {
        $ta = Taj::where('status', '1')->first();
        $this->taId=$ta->id;

        if ($ta) {
            $studentCount = Student::where('ta_id', $ta->id)->count();
            $nextNumber = $studentCount + 1;
            $this->registrationNumber = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        } else {
            $this->registrationNumber = '001';
        }
    }

    // Method to mark step as validated
    public function validateStep($step)
    {
        $this->validatedSteps[$step] = true;
    }

    public function nextStep()
    {
        $this->validateCurrentStep();
        if ($this->step < 5) {
            $this->step++;
        }
    }

    public function previousStep()
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    public function validateCurrentStep()
    {
        $rules = [];

        switch ($this->step) {
            case 1:
                sleep(3);
                $rules = array_intersect_key($this->rules, array_flip([
                    'nama_lengkap', 'nama_panggilan', 'tempat_lahir', 'tanggal_lahir', 'alamat_asal', 'nisn',
                    'jenis_kelamin', 'anak_ke', 'jumlah_saudara', 'penyakit_berat', 'berat_badan', 'tinggi_badan',
                    'golongan_darah', 'hobi', 'cita_cita', 'program_pilihan',
                ]));
                $this->titleForm='Data Sekolah Asal';
                break;
            case 2:
                sleep(3);
                $rules = array_intersect_key($this->rules, array_flip([
                    'sekolah_asal', 'alamat_sekolah', 'npsn_sekolah', 'nsm_sekolah',
                    'nomor_ijazah', 'nomor_skhu', 'nomor_peserta_un', 'nilai_bahasa_indonesia',
                    'nilai_matematika', 'nilai_ipa', 'nilai_bahasa_inggris'
                ]));
                $this->titleForm='Data Orang Tua/Wali';
                break;
                case 3:
                    sleep(3);
                    $rules = array_intersect_key($this->rules, array_flip([
                        'nama_ayah', 'tempat_lahir_ayah', 'pendidikan_ayah', 'pekerjaan_ayah', 'no_hp_ayah', 'alamat_ayah',
                        'nama_ibu', 'tempat_lahir_ibu', 'pendidikan_ibu', 'pekerjaan_ibu', 'no_hp_ibu', 'alamat_ibu'
                    ]));
                $this->titleForm='Buat Akun';
                    break;
                case 4:
                        sleep(3);
                        $rules = array_intersect_key($this->rules, array_flip([
                            'email','password','photo'
                        ]));
                break;
        }

        $this->validate($rules);
        $this->validateStep('step' . $this->step); 
    }

    public function storeNewStudent()
{
    // Create the user and store the resulting model instance
    $user = User::create([
        'name' => $this->nama_lengkap,
        'email' => $this->email,
        'password' => Hash::make($this->password),
    ]);

    // Create the student record and associate it with the created user
    $newStudent = [
        'no_pendaftaran'=>$this->registrationNumber,
        'user_id' => $user->id,
        'nama_lengkap' => $this->nama_lengkap,
        'nama_panggilan' => $this->nama_panggilan,
        'tempat_lahir' => $this->tempat_lahir,
        'tanggal_lahir' => $this->tanggal_lahir,
        'alamat_asal' => $this->alamat_asal,
        'nisn' => $this->nisn,
        'jenis_kelamin' => $this->jenis_kelamin,
        'anak_ke' => $this->anak_ke,
        'jumlah_saudara' => $this->jumlah_saudara,
        'penyakit_berat' => $this->penyakit_berat,
        'berat_badan' => $this->berat_badan,
        'tinggi_badan' => $this->tinggi_badan,
        'golongan_darah' => $this->golongan_darah,
        'hobi' => $this->hobi,
        'cita_cita' => $this->cita_cita,
        'program_pilihan' => $this->program_pilihan,
        'sekolah_asal' => $this->sekolah_asal,
        'alamat_sekolah' => $this->alamat_sekolah,
        'npsn_sekolah' => $this->npsn_sekolah,
        'nsm_sekolah' => $this->nsm_sekolah,
        'nomor_ijazah' => $this->nomor_ijazah,
        'nomor_skhu' => $this->nomor_skhu,
        'nomor_peserta_un' => $this->nomor_peserta_un,
        'nilai_bahasa_indonesia' => $this->nilai_bahasa_indonesia,
        'nilai_matematika' => $this->nilai_matematika,
        'nilai_ipa' => $this->nilai_ipa,
        'nilai_bahasa_inggris' => $this->nilai_bahasa_inggris,
        'nama_ayah' => $this->nama_ayah,
        'tempat_lahir_ayah' => $this->tempat_lahir_ayah,
        'pendidikan_ayah' => $this->pendidikan_ayah,
        'pekerjaan_ayah' => $this->pekerjaan_ayah,
        'no_hp_ayah' => $this->no_hp_ayah,
        'alamat_ayah' => $this->alamat_ayah,
        'nama_ibu' => $this->nama_ibu,
        'tempat_lahir_ibu' => $this->tempat_lahir_ibu,
        'pendidikan_ibu' => $this->pendidikan_ibu,
        'pekerjaan_ibu' => $this->pekerjaan_ibu,
        'no_hp_ibu' => $this->no_hp_ibu,
        'alamat_ibu' => $this->alamat_ibu,
        'ta_id' => $this->taId,
        'photo' => 'ini pas photo',
    ];

    // Create the student record
    Student::create($newStudent);

    // Log in the new user
    Auth::login($user);

    // Redirect to the profile page with a success message
    return redirect()->intended(route('ppdb.profile'))->with('success', 'Pendaftaran berhasil');
}


    public function render()
    {
        return view('pages.form.psb');
    }
}
