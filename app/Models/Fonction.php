<?php

namespace App\Models;

use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fonction extends Model
{
    use HasFactory;

    protected $fillable = ['fonction','departement_id'];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
}
