<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
// use Intervention\Image\Facades\Image;

class ProfilController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function profil(User $user){

        //cette variable $follows permet si l'user est connecte et qu'il click le btn suivre on recupere son id sinon on remmene faux
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->profil->id) : false;

        $postCount = $user->posts->count();//compter le nombre de publication

        $followsCount = $user->profil->followers->count();//compter le nombre d'abonné

        $followingCount = $user->following->count();//compter le nombre des suivis

        return view('profil.profil', compact('user','follows','postCount','followsCount','followingCount'));
    }

    public function edit(User $user){

        // $this->authorize('update', $user->profil);

       return view('profil.edit',compact('user'));
    }

    public function update(User $user){

        $data = request()->validate([
            'description' => 'nullable',
            'lien' => 'nullable',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:4096',
        ]);


        if (request('image')){
            $manager = new ImageManager(new Driver());
            $image = $manager->read(request('image'));
            $imageName = time() . '.' .request('image')->getClientOriginalExtension();
            $imagePath = 'uploads/' .$imageName;



            $image->cover(1200,1200);

            $image->save(storage_path("app/public/{$imagePath}"));

            auth()->user()->profil->update(array_merge($data,['image' => $imagePath]));
        }else{//sinon on fait l'enregistrement sans image
            auth()->user()->profil->update($data);
        }

        return redirect()->route('app_profil',['user' => $user]);

    }
}
