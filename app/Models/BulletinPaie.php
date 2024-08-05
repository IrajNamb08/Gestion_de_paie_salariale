<?php

namespace App\Models;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BulletinPaie extends Model
{
    use HasFactory;

    protected $fillable = ['employer_id','mois','salaire_brute','salaire_net'];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
