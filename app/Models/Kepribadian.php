<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepribadian extends Model
{
    use HasFactory;

    protected $fillable = ['kode','kepribadian','deskripsi','thumbnail'];
    public function karakteristik()
    {
        return $this->hasMany(Karakteristik::class);
    }
    public function jurusan()
    {
        return $this->hasMany(Jurusan::class);
    }

}
