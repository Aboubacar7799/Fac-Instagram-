<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\MonService\EmailService;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // Validator::make($input, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => [
        //         'required',
        //         'string',
        //         'email',
        //         'max:255',
        //         Rule::unique(User::class),
        //     ],
        //     'password' => $this->passwordRules(),
        // ])->validate();

        //recuperation de l'email
        $email=$input['email'];

        //on génere le token pour l'activation du compte des users
        $activation_token=md5(uniqid()). $email .sha1($email);

        $activation_code="";
        $length_code = 6;

        for($i = 0; $i<$length_code; $i++){

            $activation_code .= mt_rand(0,9);//la fonction mt_rand, nous permet de générer un nombre aléatoire
        }

        //recuperation des données de users
        $name=$input['prenom'].' '.$input['nom'];
        $password=$input['password'];

        $sendEmail = new EmailService;//instanciation de la classe EmailService;

        $sujet = "Activé votre compte";
        $sendEmail->envoiEmail($sujet,$email,$name,true,$activation_code,$activation_token);//envoi de l'email;

        //creation des utilisateurs, ajout dans la base de donnée
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'activation_code' => $activation_code,
            'activation_token' => $activation_token,
        ]);
    }
}
