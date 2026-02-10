<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profil;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowController extends Controller
{
    
    public function __construct(){
        $this->middleware("auth");
    }

    public function store($profil)
    {
        // 1 Interdire de suivre son propre profil
        if (auth()->user()->profil->id == $profil) {
            return response()->json(['message' => 'interdit'], 403);
        }

        // 2 Récupérer le profil ciblé
        $profilModel = Profil::findOrFail($profil);

        // 3 Vérifier AVANT le toggle
        $alreadyFollowing = auth()->user()->following()->where('profil_id',$profilModel->id)->exists();

        // 4 Toggle (TON CODE — inchangé)
        auth()->user()->following()->toggle($profil);

        // 5 Créer notification UNIQUEMENT si c’est un nouveau follow
        if (!$alreadyFollowing) {
            $userToNotify = $profilModel->user;

            // sécurité supplémentaire
            if ($userToNotify->id !== auth()->id()) {
                Notification::create([
                    'user_id' => $userToNotify->id,
                    'from_user_id' => auth()->id(),
                    'type' => 'follow',
                    'notifiable_id' => $profilModel->id,
                    'notifiable_type' => Profil::class,
                    'is_read' => false,
                ]);
            }
        }

        return response()->json(['status' => 'ok']);
    }

    // public function store($profil){
    //     //Interdire de suivre son propre profil
    //     if(auth()->user()->profil->id == $profil){
    //         return response()->json(['message' => 'interdit'],403);
    //     }

    //     auth()->user()->following()->toggle($profil);
        
    //     return response()->json(['status' => 'ok']);
    // }

    
}
