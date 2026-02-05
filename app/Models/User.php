<?php

namespace App\Models;

use App\Models\Profil;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'created_at',
        'updated_at',
        'etat',
        'activation_code',
        'activation_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected static function boot(){
        parent::boot();

        static::created(function ($user) {//lors de la creation de user on crée directment un profil pour lui
            $user->profil()->create([
                'description' => 'Profil de '.$user->name,
            ]);
        });
    }

    
    public function getRouteKeyName(){//cette fonction nous permet de recuperer le nom de l'user dans la page profil
        return 'email';
    }

    public function profil(){//la relation entre la table profil et user
        return $this->hasOne(Profil::class);
    }

    public function posts(){//relation entre Table users et post: un user à plusieurs posts
        return $this->hasMany('App\Models\Post')->orderBy('created_at','DESC');
    }

    public function following(){ //La relation entre user et profil, plusieur users peut suivres plusieurs profils:les suivis
        return $this->belongsToMany(\App\Models\Profil::class, 'profil_user', 'user_id', 'profil_id');
    }

    

    //la relation entre users et likes
    Public function likes(){
	    return $this->hasmany('App\Models\Like');
    }

    // Les personnes qui me suivent
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

}
