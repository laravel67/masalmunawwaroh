<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Guru;
use App\Models\Jabatan;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\RemembersChunkOffset;

class GuruImport implements ToCollection, WithHeadingRow, WithChunkReading
{
    use RemembersChunkOffset;
    private $successCount = 0;

    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            if (!empty($row['nama']) && !empty($row['pendidikan']) && !empty($row['mulai mengajar']) && !empty($row['guru mapel']) && !empty($row['jabatan']) && !empty($row['biografi'])) {
                $name = ucwords(strtolower($row['nama']));
                $slug = Str::slug($name);
                $pendidikan = $row['pendidikan'];
                $guruMapel = $row['guru mapel'] ?? null;
                $jabatan = $row['jabatan'] ?? null;
                $biografi = $row['biografi'] ?? '';
                $mulaiMengajar = Carbon::parse($row['mulai mengajar'])->format('Y-m-d');

                // Buat atau temukan entri guru
                $guru = Guru::firstOrCreate(
                    ['name' => $name],
                    [
                        'slug' => $slug,
                        'pendidikan' => $pendidikan,
                        'mulai_mengajar' => $mulaiMengajar,
                        'guru_mapel' => $guruMapel,
                        'jabatan' => $jabatan,
                        'biografi' => $biografi,
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
