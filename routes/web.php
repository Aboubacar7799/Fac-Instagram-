<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FollowControllers;
use Symfony\Component\HttpFoundation\Request; // Assure-toi d'avoir ce contrôleur pour la logique de suivi
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*Les Routes pour tout qui conserne l'Authentification*/

Route::controller(LoginController::class)->group(function() {
    Route::get('/logout','logout')->name('app_logout');
    Route::post('/existe','existeEmail')->name('app_existe_email');
    Route::match(['get', 'post'], '/activation_code/{token}','activationCode')->name('app_activation_code');
    Route::get('/user_checker','userChecker')->name('app_user_checker');
    Route::get('/renvoi_code_activation/{token}','renvoiCodeActivation')->name('app_renvoi_code_activation');
    Route::get('/activation_code_lien/{token}','activationCodeLien')->name('app_activation_code_lien');
    Route::match(['get','post'],'/activation_code_changer_email/{token}','activationCodeChangerEmail')->name('app_activation_code_changer_email');
    Route::match(['get', 'post'], '/password_oublier', 'passwordOublier')->name('app_password_oublier');
    Route::match(['get', 'post'], '/change_password/{token}', 'changePassord')->name('app_change_password');

});

/*Les Routes de Dashboard*/ 
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->middleware('auth')->name('app_home');
    Route::get('/about', 'about')->middleware('auth')->name('app_about');
    Route::get('/dashboard','dashboard')->middleware('auth')->name('app_dashboard');
});


/*Les Routes pour faire une Publication*/
Route::controller(PostController::class)->group(function(){
    //Pour afficher la page qui permet de créer un post ou publication
    Route::match(['get', 'post'],'/posts/create','create')->middleware('auth')->name('app_post_create');
    //Pour créer un Post ou publication
    Route::post('/posts','store')->middleware('auth')->name('app_post_store');
    //Pour afficher les différents images quand t-on click dessus
    Route::get('/posts/{post}','afficheImage')->middleware('auth')->name('app_affiche_image');
    //Pour afficher les différents Post ou Publication
    Route::get('/','index')->middleware('auth')->name('app_post_index');
    //Pour permettre de liker ou disliker
    // Route::post('/like','like')->name('app_post_like');

});

//la route pour reaction en ajax qui permet de like un post
Route::post('/reaction/ajax', [LikeController::class, 'ajax'])->middleware('auth')->name('reaction.ajax');

/*Les Routes pour le Following, les methodes de Suivies*/
Route::controller(FollowController::class)->group(function(){
    Route::post('/follows/{profil}','store')->name('app_follows_store');
    // Route::get('/following','listeFollowing')->name('app_Following_liste');
});

/*Les Routes de la Messagerie*/
Route::controller(ConversationController::class)->group(function(){
    Route::get('messagerie','index')->middleware('auth')->name('index');

    Route::get('conversation/{user}','show')
        ->middleware('auth')
        ->name('app_conversations_show');

    Route::post('conversation/{user}','store')
        ->middleware('auth')
        ->middleware('can:talkTo,user')
        ->name('app_conversations_store');
});



// --- Routes pour les Commentaires ---
// Route pour enregistrer un commentaire (utilisée par notre script AJAX)
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
Route::get('/comments/{comments}/edit', [CommentController::class, 'edit'])->middleware('auth')->name('app_comment_edit');
Route::patch('/comments/{comments}',[CommentController::class,'update'])->middleware('auth')->name('app_comment_update');




// --- Routes pour les Relations (Followers/Following) ---
// Page unique pour voir ses abonnés et ses suivis
Route::get('/profil/{user}/relations', function (User $user, Request $request) {
    // On récupère tous les utilisateurs sauf l'utilisateur connecté
    // On utilise with('profil') pour éviter les erreurs "null" rencontrées précédemment
    $allUsers = User::with('profil')->where('id', '!=', auth()->id())->get();

    return view('profil.relations', [
        'user' => $user, //profil consulté
        'allUsers' => $allUsers,
        'tab' => $request->get('tab','discover'),
    ]);
})->name('app_relations_index')->middleware('auth');


/*Les Routes consernant le Profile de L'utilisateur*/
Route::controller(ProfilController::class)->group(function () {
    Route::get('/profil/{user}', 'profil')->middleware('auth')->name('app_profil');
    Route::get('/profil/{user}/edit', 'edit')->middleware('auth')->name('app_profil_edit');
    Route::patch('/profil/{user}', 'update')->middleware('auth')->name('app_profil_update');
});

// Route pour l'action de suivre/ne plus suivre (appelée par ton composant FollowButton)
Route::post('/follow/{profilId}', [FollowControllers::class, 'toggle'])->name('app_follow_toggle');


Route::get('/posts/{post}/comments', function (Post $post) {
    return view('posts.comments', compact('post'));
})->middleware('auth')->name('posts.comments');

// les routes pour la notification 
Route::middleware('auth')->group(function(){
    Route::get('/notifications',[NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/{notifications}', [NotificationController::class, 'read'])->name('notifications.read');
});

//Les routes pour le contact et à propos
 Route::get('/contact',[ContactController::class, 'index'])->name('app_contact_index');
//  Route::post('/contact',[ContactController::class, 'store'])->name('app_contact_store');

 Route::get('/about',[AboutController::class, 'index'])->name('app_about');