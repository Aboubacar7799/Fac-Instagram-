<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profil extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){//la relation entre la table profil et user
        return $this->belongsTo('App\Models\User');
    }

    public function getImage(){
        $imagePath = $this->image ?? 'avatars/default1.jpg';

        return "/storage/" .$imagePath;
    }

    public function followers(){//La relation entre user et profil plusieur users peut suivres plusieurs profils:les suivers
        return $this->belongsToMany("App\Models\User");
    }
    

}
