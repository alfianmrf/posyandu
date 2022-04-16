<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participate extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function balita()
    {
        return $this->hasOne(Balita::class);
    }

    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }
}
