<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowControllers extends Controller
{
    public function __construct()
    {
        // On s'assure que seul un utilisateur connecté peut suivre quelqu't'un
        $this->middleware('auth');
    }

    public function toggle(Profil $profil)
    {
        // La méthode toggle() attache ou détache automatiquement l'ID du profil
        // de la liste des abonnements de l'utilisateur connecté.
        $status = auth()->user()->followings()->toggle($profil->id);

        // On retourne une réponse JSON pour que ton composant Vue.js 
        // puisse changer de couleur ou de texte sans recharger la page.
        return response()->json([
            'attached' => $status['attached'], // true si on vient de suivre, false si on vient de ne plus suivre
            'message' => count($status['attached']) > 0 ? 'Abonné avec succès' : 'Désabonné'
        ]);
    }
}
