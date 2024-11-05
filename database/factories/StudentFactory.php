<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // return [
        //     'nik' => $this->faker->unique()->numerify('##############'),
        //     'ta_id' => 1, // Sesuaikan rentang angka sesuai dengan jumlah data di tabel tajs
        //     'nama' => $this->faker->name,
        //     'umur' => $this->faker->numberBetween(11, 18),
        //     'tempat_lahir' => $this->faker->city,
        //     'tanggal_lahir' => $this->faker->date(),
        //     'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
        //     'asal_sekolah' => $this->faker->company,
        //     'npu' => $this->faker->unique()->numerify('##############'),
        //     'tahun_lulus' => $this->faker->numberBetween(2010, 2022),
        //     'nisn' => $this->faker->unique()->numerify('##############'),
        //     'nama_ayah' => $this->faker->name('male'),
        //     'nama_ibu' => $this->faker->name('female'),
        //     'nik_ayah' => $this->faker->unique()->numerify('##############'),
        //     'nik_ibu' => $this->faker->unique()->numerify('##############'),
        //     'desa' => $this->faker->citySuffix,
        //     'kecamatan' => $this->faker->citySuffix,
        //     'kabupaten' => $this->faker->city,
        //     'provinsi' => $this->faker->state,
        //     'status' => $this->faker->randomElement(['baru', 'pindahan']),
        //     'jenjang' => $this->faker->randomElement(['mts', 'ma']),
        //     'kelas' => $this->faker->randomElement(['I', 'II', 'III']),
        //     'kontak' => $this->faker->unique()->optional()->phoneNumber, // Kontak bisa null
        //     'email' => $this->faker->unique()->safeEmail,
        //     'image' => null,
        //     'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        //     'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        // ];

        return [
            'no_pendaftaran' => Str::random(10),
            'user_id' => $this->faker->numberBetween(2, 4),
            'ta_id' => 1,
            'nama_lengkap' => $this->faker->name,
            'nama_panggilan' => $this->faker->firstName,
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date(),
            'alamat_asal' => $this->faker->address,
            'nisn' => $this->faker->unique()->numerify('##########'),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'anak_ke' => $this->faker->numberBetween(1, 5),
            'jumlah_saudara' => $this->faker->numberBetween(1, 10),
            'penyakit_berat' => $this->faker->optional()->word,
            'berat_badan' => $this->faker->randomFloat(2, 30, 80),
            'tinggi_badan' => $this->faker->randomFloat(2, 120, 180),
            'golongan_darah' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'hobi' => $this->faker->word,
            'cita_cita' => $this->faker->word,
            'program_pilihan' => $this->faker->randomElement(['Tahfidz', 'Umum']),
            'sekolah_asal' => $this->faker->company,
            'alamat_sekolah' => $this->faker->address,
            'npsn_sekolah' => $this->faker->numerify('########'),
            'nsm_sekolah' => $this->faker->optional()->numerify('##########'),
            'nomor_ijazah' => $this->faker->numerify('###############'),
            'nomor_skhu' => $this->faker->optional()->numerify('###############'),
            'nomor_peserta_un' => $this->faker->optional()->numerify('###############'),
            'nilai_bahasa_indonesia' => $this->faker->randomFloat(2, 60, 100),
            'nilai_matematika' => $this->faker->randomFloat(2, 60, 100),
            'nilai_ipa' => $this->faker->randomFloat(2, 60, 100),
            'nilai_bahasa_inggris' => $this->faker->randomFloat(2, 60, 100),
            'nama_ayah' => $this->faker->name('male'),
            'tempat_lahir_ayah' => $this->faker->city,
            'pendidikan_ayah' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'Diploma', 'Sarjana']),
            'pekerjaan_ayah' => $this->faker->jobTitle,
            'no_hp_ayah' => '082279761815',
            'alamat_ayah' => $this->faker->address,
            'nama_ibu' => $this->faker->name('female'),
            'tempat_lahir_ibu' => $this->faker->city,
            'pendidikan_ibu' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'Diploma', 'Sarjana']),
            'pekerjaan_ibu' => $this->faker->jobTitle,
            'no_hp_ibu' => '082279761815',
            'alamat_ibu' => $this->faker->address,
            'photo' => $this->faker->optional()->imageUrl(200, 200, 'people'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
