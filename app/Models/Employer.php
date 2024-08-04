<?php

namespace App\Models;

use App\Models\Fonction;
use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = ['departement_id','fonction_id','nom','prenom','adresse',
    'telephone','profil','sexe','cin','numCnaps','salaire','dateEmbauche'];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function fonction()
    {
        return $this->belongsTo(Fonction::class);
    }

    public function getProfileImagePathAttribute()
    {
        return $this->profil ? asset('storage/app/public/Employer/' . $this->profil) : null;
    }
}
