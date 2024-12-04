<?php

namespace App\Models;
use App\Http\Controllers\EleveController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EleveModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'image'
    ];

    public function Club(){
        return $this->belongsTo(ClubModel::class);
    }

    public function Activite(){
        return $this->hasMany(ActiviteModel::class);
    }
}
