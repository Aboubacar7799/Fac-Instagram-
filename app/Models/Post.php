<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){//relation entre Table users et post: un post appartient à un seul user
        return $this->belongsTo('App\Models\User');
    }

    //la relation entre posts et likes
    Public function likes(){
	    return $this->hasmany(Like::class);
    }

    //on retourne si le post est liker ou pas par user connecté et la fonction isEmpty qui verifie si c'est vide on retourne false sinon on retourne true le contraire 
    // public function estLikerParAuthUser(){

    //     if (!auth()->check())
    //     {
    //         return false;
    //     }
        
    //     return $this->likes->where('user_id', auth()->id)->isEmpty()->exists();
    // }

    public function getImageUrl(){
        if($this->image && Storage::disk('public')->exists($this->image)){
            return asset('storage/' . $this->image);
        }
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function userReaction(){
        if (!auth()->check()){
            return null;
        }

        $like = $this->likes()->where('user_id', auth()->id())->first();

        return $like ? $like->type : null ;
    }

    public function userLike(){
        return $this->likes()->where('user_id', auth()->id())->first();
    }

    

}
