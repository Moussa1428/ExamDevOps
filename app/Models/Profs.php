<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profs extends Model
{
    use HasFactory;


    protected $fillable = ['nom', 'prenom', 'email'];

    public function cours()
    {
        return $this->hasMany(Cours::class, 'prof_id');
    }
}
