<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function growths()
    {
        return $this->hasMany(Growth::class);
    }

    public function participates()
    {
        return $this->hasMany(Participate::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
