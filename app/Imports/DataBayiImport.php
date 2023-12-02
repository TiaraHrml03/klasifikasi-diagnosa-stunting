<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DataBayiImport implements WithStartRow, WithChunkReading
{
    use Importable;

    public function startRow(): int
    {
        return 2;
    }

    public function chunkSize(): int
    {
        return 100;   
    }
}
