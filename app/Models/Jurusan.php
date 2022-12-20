<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $fillable = ['kepribadian_id','jurusan','deskripsi','gambar'];
    public function kepribadian()
    {
        return $this->belongsTo(Kepribadian::class);
    }
    public function rule()
    {
        return $this->hasMany(Rule::class);
    }
}
