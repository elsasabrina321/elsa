<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    protected $fillable = ['jurusan_id','rule','deskripsi'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
    public function analisa()
    {
        return $this->hasMany(Analisa::class);
    }
    public function detail()
    {
        return $this->hasMany(Detail::class);
    }
}
