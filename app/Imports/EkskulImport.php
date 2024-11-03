<?php

namespace App\Imports;
use App\Models\Ekskul;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\RemembersChunkOffset;

class EkskulImport implements ToCollection, WithHeadingRow, WithChunkReading
{
    use RemembersChunkOffset;
    private $successCount = 0;

    public function collection(Collection $collection)
{
    foreach ($collection as $row) {
        if (!empty($row['nama']) && !empty($row['kategori'])) {
            $name = ucwords(strtolower($row['nama']));
            $slug = Str::slug($name);
            $category = strtolower(str_replace(' ', '', $row['kategori']));
            $category = in_array($category, ['fisik', 'nonfisik']) ? $category : 'nonfisik';
            $body = $row['deskripsi'] ?? '';

            Ekskul::firstOrCreate(
                ['name' => $name],
                [
                    'slug' => $slug,
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
