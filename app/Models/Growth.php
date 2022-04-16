<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Growth extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function balita()
    {
        return $this->belongsTo(Balita::class);
    }
}
