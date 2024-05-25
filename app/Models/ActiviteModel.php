<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ActiviteModel extends Model
{
    use HasFactory;

    public function Eleve(){
        return $this->belongsToMany(EleveModel::class);
    }
}
