<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Sarana;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\RemembersChunkOffset;

class SaranaImport implements ToCollection, WithHeadingRow, WithChunkReading
{
    use RemembersChunkOffset;
    private $successCount = 0;

    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            if (isset($row['nama']) && isset($row['deskripsi']) && isset($row['jumlah'])) {
                $name = ucwords(strtolower($row['nama']));
                $slug = Str::slug($name);
            
                Sarana::firstOrCreate(
                    ['name' => $name],
                    [
                        'slug' => $slug,
                        'jumlah_unit' => (int) $row['jumlah'],
                        'body' => $row['deskripsi'] ?? '',
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
