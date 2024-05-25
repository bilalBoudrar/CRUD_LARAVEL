<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EleveModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
    ];

    public function Club(){
        return $this->belongsTo(ClubModel::class);
    }

    public function Activite(){
        return $this->hasMany(ActiviteModel::class);
    }
}
