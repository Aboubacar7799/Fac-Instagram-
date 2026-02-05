<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowController extends Controller
{
    //

    public function __construct(){
        $this->middleware("auth");
    }

    public function store(User $user){

        if (auth()->id() === $user->id) {
            return response()->json(['message' => 'Interdit'], 403);
        }
        auth()->user()->following()->toggle($user->id);

        return response()->json(['status' => 'ok']);
    }

    //fonction pour afficher la liste des users que je suit
    public function listeFollowing(){

        $users = auth()->user()->following->pluck('user_id');//recuperer les user_id du profil auquel utilisateur est abonné

        $profils = Profil::whereIn('user_id', $users)->with('user')->latest()->paginate(20);//recuperation des posts des publications des differents users par ordre decroissant avec la fonction latest()

        return view('profil.listeFollowing',compact('profils'));
    }

    
}
