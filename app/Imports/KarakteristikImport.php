<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\Kepribadian;
use App\Models\Karakteristik;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KarakteristikImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $cek = Kepribadian::where('kode',$row['kode_kepribadian'])->first();
            $input =  new Karakteristik([
                'kode' => $row['kode'],
                'kepribadian_id' => $cek->id,
                'karakteristik' => $row['karakteristik'],
                'pertanyaan' => $row['pertanyaan'],
            ]);

        return $input;
    }
}
