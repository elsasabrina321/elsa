<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karakteristik extends Model
{
    use HasFactory;

    protected $fillable = ['kepribadian_id','kode','karakteristik','nilai_pakar','pertanyaan'];
    public function kepribadian()
    {
        return $this->belongsTo(Kepribadian::class);
    }
}
