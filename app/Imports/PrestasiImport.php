<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Achievment;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\RemembersChunkOffset;

class PrestasiImport implements ToCollection, WithHeadingRow, WithChunkReading
{
    use RemembersChunkOffset;
    private $successCount = 0;

    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            if (isset($row['nama']) && isset($row['kategori']) && isset($row['tingkat'])) {
                $title = ucwords(strtolower($row['nama']));
                $slug = Str::slug($title);
                $category = strtolower(str_replace(' ', '', $row['kategori']));
                $category = in_array($category, ['akademik', 'nonakademik', 'siswa']) ? $category : 'akademik';
                $tingkat = ucwords(strtolower($row['tingkat']));
                $tingkat = in_array($tingkat, ['Internasional', 'Nasional', 'Provinsi', 'Kabupaten', 'Kecamatan', 'Desa', 'Sekolah']) ? $tingkat : 'Sekolah';
                $body = $row['deskripsi'] ?? '';

                Achievment::firstOrCreate(
                    ['title' => $title],
                    [
                        'slug' => $slug,
                        'tingkat' => $tingkat,
                        'category' => $category,
                        'body' => $body,
                        'image' => null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
                $this->successCount++;
            }
        }
    }


    public function chunkSize(): int
    {
        return 1000;
    }

    public function getSuccessCount(): int
    {
        return $this->successCount;
    }
}
