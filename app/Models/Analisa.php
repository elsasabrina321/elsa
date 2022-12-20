<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analisa extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','rule_id','jurusan_id','tingkat_kepercayaan','tanggal','status'];

    public function detail()
    {
        return $this->hasMany(Detail::class);
    }
    public function rule()
    {
        return $this->belongsTo(Rule::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
