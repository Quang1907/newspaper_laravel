<?php

namespace App\Imports;

use App\Models\Category;
use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RemembersChunkOffset;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class CategoryImport implements ToCollection, WithHeadingRow, ShouldQueue, WithChunkReading, WithProgressBar, WithBatchInserts
{
    use Importable, Batchable, RemembersChunkOffset;
    
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Category::create([
                'name' => $row['name'],
                'slug' => $row['slug'],
                'parent_id' => $row[ 'parent_id' ]
            ]);
        }
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Category([
            'name' => $row[0],
            'slug' => $row[1],
            'parent_id' => $row[2]
        ]);
    }

    public function chunkSize(): int
    {
        return 100;
    }

    public function batchSize(): int
    {
        return 100;
    }
}
