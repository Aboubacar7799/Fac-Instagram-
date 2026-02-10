<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\EnvoiCode;
use Illuminate\Http\Request;
use App\MonService\EmailService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Mail\InitialisationPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportException;

class LoginController extends Controller
{
    protected $request;

    public function __construct(request $request){
        $this->request = $request;
    }

    public function logout(){//cette fonction nous permet de se deconnecter et nous rediriger vers login
        Auth::logout();
        return redirect()->route('login');
    }


    public function existeEmail(){//cette fonction nous permet de verifié si l'email existe déjà dans la base de donné
        $email=$this->request->input('email');//on recupere l'email saisi par l'user

        $user=User::where('email',$email)->first();//cette requete nous permet de rechercher l'email saisi par l'user

        $reponse="";
        $reponse=($user)?"existe":"noExiste";//on verifi si l'user contient l'information et on affecte à $reponse

        return response()->json(['response'=>$reponse]);
    }


    public function activationCode($token){//pour afficher la page activation_code

        $user=User::where('activation_token',$token)->first();//comme le token est unique a des users donc on fait une requete en fonction de token
        if(!$user){
            return redirect()->route('login')->with('danger','Le token saisi dans url ne correspond à aucun utilisateur');
        }
        if($this->request->ismethod('post')){//si la methode est post on active le compte de user

            $code=$user->activation_code;//on recupere le code d'activation dans Db de user

            $activation_code=$this->request->input('activation_code');//on recupere le code saisi par user

            if($activation_code !== $code){//on verifi si le code saisi est different du celui de la Db, si vrai message d'erreur
                return back()->with(['danger' => 'Le code saisi est incorrect',
                                     'activation_code' =>$activation_code]);
            }else{//sinon on active le compte
                DB::table('users')
                ->where('id', $user->id)
                ->update(['etat' => 1,
                    'activation_code' =>'',
                    'activation_token' =>'',
                    'email_verified_at' => new \DateTimeImmutable,
                    'updated_at' => new \DateTimeImmutable
                ]);
                return redirect()->route('login')->with('success','Votre email est verifié avec succès ');
            }
        }
        return view('auth.activation_code',['token'=>$token]);
    }


    /**verifier si l'utilisateur à activer son compte ou pas avant d'être authentifié */
    public function userChecker(){
        $activation_token = Auth::user()->activation_token;
        $etat = Auth::user()->etat;
        $email_verified_at = Auth::user()->email_verified_at;

        if($etat !== 1 || $email_verified_at === null){//si etat est egal à 0 on deconnecte l'user
            Auth::logout(); //si le code n'est pas encore verifier on deconnecte l'user après on lui redirige vers la page activation compte
            return redirect()->route('app_activation_code',['token'=>$activation_token])
                             ->with('warning',"Votre compte n'est pas activer\non vous a envoyé un code de confirmation par l'email, verifier votre boîte email");
        }else{
            return redirect()->route('app_post_index');
        }
    }

    //cette fonction nous permet de renvoyer le code d'activation à l'utilisateur s'il clic sur le btn renvoie
    public function renvoiCodeActivation($token){
        $user=User::where('activation_token',$token)->first();//comme le token est unique a des users donc on fait une requete en fonction de token

        $email=$user->email;
        $name=$user->name;
        $activation_code=$user->activation_code;
        $activation_token=$user->activation_token;

        // Envoyer une notification par e-mail à utilisateur
        try {
            Mail::to($email)->send(new EnvoiCode($activation_token, $activation_code, $name));
        } catch (TransportException $e) {
            // Annule la transaction en cas d'erreur de connexion
            DB::rollBack();

            // Log the error for debugging
            Log::error('Erreur de connexion lors de l\'envoi de l\'e-mail: ' . $e->getMessage());

            // Retourner une réponse d'erreur personnalisée
            return redirect()->back()->with('danger', 'Erreur de connexion. Veuillez vérifier votre connexion Internet et réessayer.');
        }

        return redirect()->route('app_activation_code',['token' => $token])->with('success','On vous a renvoyé le code d\'activation par email');
    }

    //cette fonction nous permet d'activer le compte à travers le lien que l'utilisateur va cliqué dessus
    public function activationCodeLien($token){
        $user=User::where('activation_token',$token)->first();
        if(!$user){
            return redirect()->route('login')->with('danger','Ce token ne correspond à aucun utilisateur');
        }else{
            DB::table('users')
                ->where('id', $user->id)
                ->update(['etat' => 1,
                    'activation_code' =>'',
                    'activation_token' =>'',
                    'email_verified_at' => new \DateTimeImmutable,
                    'updated_at' => new \DateTimeImmutable
                ]);
                return redirect()->route('login')->with('success','Votre email est verifié avec succès ');
        }
    }


    //la fonction pour changer l'adresse email une fois oublié
    public function activationCodeChangerEmail($token){

        if($this->request->ismethod('post')){
            $new_email = $this->request->input('changer_email');
            $email_existe = User::where('email',$new_email)->first();
            $user=User::where('activation_token',$token)->first();

            if($email_existe){

                return back()->with(['danger' =>'Cet email est déjà utilisé dans notre base de donnée !!!',
                                     'changer_email' => $new_email]);

            }else if(Empty($new_email)){
                return back()->with(['danger' =>'ce champ est obligatoire !!!']);
            }else{
                DB::table('users')->where('id', $user->id)
                    ->update(['email' => $new_email,
                    'email_verified_at' => new \DateTimeImmutable,
                    'updated_at' => new \DateTimeImmutable
                ]);

                $name=$user->name;
                $activation_code=$user->activation_code;
                $activation_token=$user->activation_token;

                // Envoyer une notification par e-mail à utilisateur
                try {
                    Mail::to($new_email)->send(new EnvoiCode($activation_token, $activation_code, $name));
                } catch (TransportException $e) {
                    // Annule la transaction en cas d'erreur de connexion
                    DB::rollBack();

                    // Log the error for debugging
                    Log::error('Erreur de connexion lors de l\'envoi de l\'e-mail: ' . $e->getMessage());

                    // Retourner une réponse d'erreur personnalisée
                    return redirect()->back()->with('danger', 'Erreur de connexion. Veuillez vérifier votre connexion Internet et réessayer.');
                }

                return redirect()->route('app_activation_code',['token' =>$token])
                        ->with('success','Votre email est changé avec succès, verifier votre boîte email pour activer votre compte');
            }
        }else{
            return view('auth.activation_code_changer_email',['token'=> $token]);
        }
    }


    //cette fonction va nous permettre d'iniatilisé le mot de passe une fois l'oublié
    public function passwordOublier(){

        //si la requete est de type post on fait le traitement sinon on retour la page password_oublier
        if($this->request->ismethod('post')){
            $email = $this->request->input('envoi_email');
            $user = DB::table('users')->where('email',$email)->first();
            $message=null;
            if($user){
                $name = $user->name;

                //on génere le token pour la réinitialisation du mot de passe de users
                $activation_token = md5(uniqid()). $email .sha1($email);

                // Envoyer une notification par e-mail à Utilisateur
                try {
                    Mail::to($email)->send(new InitialisationPassword($activation_token, $name));
                } catch (TransportException $e) {
                    // Annule la transaction en cas d'erreur de connexion
                    DB::rollBack();

                    // Log the error for debugging
                    Log::error('Erreur de connexion lors de l\'envoi de l\'e-mail: ' . $e->getMessage());

                    // Retourner une réponse d'erreur personnalisée
                    return redirect()->back()->with('danger', 'Erreur de connexion. Veuillez vérifier votre connexion Internet et réessayer.');
                }

                //On registre le token dans la base de donnée qu'on a generer pour qu'on puisse l'utilisé dans le lien de la view initial_pwd
                DB::table('users')->where('email', $email)
                                  ->update(['activation_token' => $activation_token]);

                //message de confirmation
                $message="Nous venons de t'envoyer une requête d'initialisation du mot de passe, verifi ta boite email";
                return back()->withErrors(['email-success' => $message])
                             ->with('old-email', $email)
                             ->with('success',$message);
            }else{
                //message d'erreur
                $message="Cet email n'existe pas dans notre base de donnée!";
                return back()->withErrors(['email-error'=> $message])
                             ->with('old-email', $email)
                             ->with('danger',$message);
            }

        }else{
            //si la requete est de type get on retour la page password_oublier
            return view('auth.password_oublier');
        }
    }

    //fonction pour maintenant changer le mot de passe
    public function changePassord($token){

        //si la methode est de type post, on fait se traitement et si c'est le cas sinon on retourne juste à la page change_password
        if($this->request->ismethod('post')){

            $new_pwd = $this->request->input('new-pwd');
            $confirm_pwd = $this->request->input('confirm-pwd');

            $user = DB::table('users')->where('activation_token',$token)->first();
            if($user){//si c'est user on traite se bout de code
                DB::table('users')
                    ->where('id',$user->id)
                    ->update(['password' => Hash::make($new_pwd),
                              'updated_at' => new \DateTimeImmutable,
                              'activation_token' =>'',
                            ]);
                return redirect()->route('login')
                                 ->with('success','Votre mot de passe est changé avec succès');
            }else{//sinon, on affiche juste un message d'erreur
                $message="Le token saisi dans url ne correspond à aucun utilisateur";
                return back()->with('danger',$message)
                             ->with('new-pwd',$new_pwd)
                             ->with('new-pwd-confirm',$confirm_pwd);
            }
        }else{
            return view('auth.change_password',['activation_token'=>$token]);
        }
    }

}
