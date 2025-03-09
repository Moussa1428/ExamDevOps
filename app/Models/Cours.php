<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $fillable = ['libelle', 'prof_id'];

    public function prof()
    {
        return $this->belongsTo(Profs::class, 'prof_id');
    }
}
