<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'specialite',
        'telephone',
        'email',
        'adresse',
    ];

    // Vous pouvez ajouter des relations avec d'autres entités, par exemple, Consultation
    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
}