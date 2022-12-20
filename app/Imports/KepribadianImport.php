<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\Kepribadian;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KepribadianImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Kepribadian([
            'kode' => $row['kode'],
            'kepribadian' => $row['kepribadian'],
            'deskripsi' => $row['deskripsi'],
        ]);
    }
}
