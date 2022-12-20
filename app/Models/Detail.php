<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable=['analisa_id','rule_id','kepercayaan'];

    public function analisa()
    {
        return $this->belongsTo(Analisa::class);
    }
    public function rule()
    {
        return $this->belongsTo(Rule::class);
    }
}
