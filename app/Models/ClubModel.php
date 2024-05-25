<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubModel extends Model
{
    use HasFactory;

    public function Eleve(){
        return $this->hasMany(EleveModel::class);
    }
}
