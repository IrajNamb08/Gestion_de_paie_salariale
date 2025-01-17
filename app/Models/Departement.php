<?php

namespace App\Models;

use App\Models\Employer;
use App\Models\Fonction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departement extends Model
{
    use HasFactory;
    protected $fillable = ['departement'];

    public function fonctions()
    {
        return $this->hasMany(Fonction::class);
    }

    public function employers()
    {
        return $this->hasMany(Employer::class);
    }
}
