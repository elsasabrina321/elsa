<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\Kepribadian;
use App\Models\Jurusan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JurusanImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $cek = Kepribadian::where('kode',$row['kode_kepribadian'])->first();
        if(!empty($cek)){
           $input =  new Jurusan([
                'jurusan' => $row['jurusan'],
                'kepribadian_id' => $cek->id,
                'deskripsi' => $row['deskripsi'],
            ]);
        }
        return $input;
        
    }
}
