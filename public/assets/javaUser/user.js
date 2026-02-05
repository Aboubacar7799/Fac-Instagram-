/*
*
Script pour la verification de l'enregistrement du l'user
*/

$('#register-user').click(e => {
    e.preventDefault();//empêche la navigation vers URL

    verificationFormulaire();//appel de la fonction de verication des infos de users

});

function verificationFormulaire() {

    //Récuperation des élements de l'input c'est-à dire via les id
    var prenom = $('#prenom');
    var nom = $('#nom');
    var email = $("#email");
    var password = $("#password");
    var password_confirm = $("#password-confirm");

    //Récuperation des valeurs de ces inputs
    var prenom_value = $('#prenom').val();
    var nom_value = $('#nom').val();
    var email_value = $('#email').val();
    var password_value = $('#password').val();
    var password_confirm_value = $('#password-confirm').val();
    var termes = $('#terme');
    var verifNomPrenom = /^[a-zA-Z].*$/;
    // var verifEmail = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/;


    //Verification du Prénom
    if (prenom_value === "") {
        prenom.removeClass('is-valid');
        prenom.addClass('is-invalid');
        $('#error-register-prenom').text("Prénom ne doit pas être vide");
        prenom.focus();
    } else if (!prenom_value.match(verifNomPrenom)) {
        prenom.removeClass('is-valid');
        prenom.addClass('is-invalid');
        $('#error-register-prenom').text("Prénom doit commencer par une lettre, non une lettre accentué et non un chiffre");
        prenom.focus();
    } else {
        let lenPrenom = prenom_value.length;
        if (lenPrenom < 3) {
            prenom.removeClass('is-valid');
            prenom.addClass('is-invalid');
            $('#error-register-prenom').text("Prénom doit contenir au moin 3 caractères");
            prenom.focus();
        } else {
            prenom.removeClass('is-invalid');
            prenom.addClass('is-valid');
            $('#error-register-prenom').text("");

            //Verification du Nom
            if (nom_value === "") {
                nom.removeClass("is-valid");
                nom.addClass("is-invalid");
                $("#error-register-nom").text("Nom ne doit pas être vide");
                nom.focus();
            } else if (!nom_value.match(verifNomPrenom)) {
                nom.removeClass("is-valid");
                nom.addClass("is-invalid");
                $("#error-register-nom").text("Nom doit commencer par une lettre, non une lettre accentué et non un chiffre");
                nom.focus();
            } else {
                let lenNom = nom_value.length;
                if (lenNom < 3) {
                    nom.removeClass('is-valid');
                    nom.addClass('is-invalid');
                    $('#error-register-nom').text("Nom doit contenir au moin 3 caractères");
                    nom.focus();
                } else {
                    nom.removeClass('is-invalid');
                    nom.addClass('is-valid');
                    $('#error-register-nom').text("");

                    //verification de l'email
                    var res = emailExisteJs(email_value);
                    if (email_value === "") {
                        email.removeClass('is-valid');
                        email.addClass("is-invalid");
                        $('#error-register-email').text("Email est obligatoire");
                        email.focus();
                    } else if (!emailVerif(email_value)) {
                        email.removeClass('is-valid');
                        email.addClass("is-invalid");
                        $('#error-register-email').text("Email non valide");
                        email.focus();
                    } else if (res === 'existe'){
                        email.removeClass('is-valid');
                        email.addClass("is-invalid");
                        $('#error-register-email').text("Cet email existe déjà dans notre base de donnée");
                        email.focus();
                    } else {
                        email.removeClass('is-invalid');
                        email.addClass('is-valid');
                        $('#error-register-email').text("");

                        //verification du mot de passe
                        if (password_value === "") {
                            password.removeClass('is-valid');
                            password.addClass("is-invalid");
                            $('#error-register-password').text("Mot de passe est obligatoire");
                            password.focus();
                        } else if (!passwordVerif(password_value)) {
                            password.removeClass('is-valid');
                            password.addClass("is-invalid");
                            $('#error-register-password').text("Le mot de passe doit contenir :\nune lettre majuscule une lettre minuscule, un chiffre et les caractères speciaux taille: (8 à 12 caractères)");
                            password.focus();
                        } else {
                            password.removeClass('is-invalid');
                            password.addClass('is-valid');
                            $('#error-register-password').text("");

                            //verification du mot de passe confirm
                            if (password_confirm_value === "") {
                                password_confirm.removeClass('is-valid');
                                password_confirm.addClass("is-invalid");
                                $('#error-register-password-confirm').text("Mot de passe confirmation est obligatoire");
                                password_confirm.focus();
                            } else if (password_value !== password_confirm_value) {
                                password_confirm.removeClass('is-valid');
                                password_confirm.addClass("is-invalid");
                                $('#error-register-password-confirm').text("Les mots de passe ne sont pas identiques !");
                                password_confirm.focus();
                            } else {
                                $('#error-register-password-confirm').text("");
                                password_confirm.removeClass('is-invalid');
                                password_confirm.addClass('is-valid');

                                //Verification du terme de condition
                                if(termes.is(':checked')){
                                    termes.removeClass('is-invalid');
                                    termes.addClass('is-valid');
                                    $('#error-register-terme').text("");

                                    //Enregistrement dans la base de donnée
                                        $('#form-registre').submit()
                                }else{
                                    termes.removeClass('is-valid');
                                    termes.addClass('is-invalid');
                                    $('#error-register-terme').text("Vous devrez accepter les termes de condition");
                                }
                            }
                        }
                    }
                }
            }
        }
    }

}

//Evenement pour les termes de condition (si c'est coché sa devient vert au contraire c'est rouge)
$("#terme").change(function(){
    var termes=$("#terme");
    if(termes.is(':checked')){
        termes.removeClass('is-invalid');
        termes.addClass('is-valid');
        $('#error-register-terme').text("");
    }else{
        termes.removeClass('is-valid');
        termes.addClass('is-invalid');
        $('#error-register-terme').text("Vous devrez accepter les termes de condition");
    }
});

//Declaration fonction de verification de l'email avec l'expression regrex
function emailVerif(email) {
    return /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/.test(email);
}

//Declaration fonction de verification de mot de passe avec l'expression regrex
function passwordVerif(password) {
    return /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$^&*]{8,12}$/.test(password);
}


//Cette fonction nous permet de verifier si l'email saisi dans le formulaire registre existe dans la base de donnée
function emailExisteJs(email){
    var url = $('#email').attr('url-emailExist');
    var token = $('#email').attr('token');
    var res="";

    $.ajax({
        type:'POST',
        url:url,
        data:{
            '_token':token,
            email:email
        },
        success:function(result){
            res = result.response;
        },
        async:false
    });
    return res;

}

//CETTE PARTIE EST DEDIE POUR LE CHANGEMENT DU MOT DE PASSE

$('#changerSubmit').click(e => {
    e.preventDefault();//empêche la navigation vers URL

    verificationPassword();

});

function verificationPassword() {

    //Récuperation des élements de l'input c'est-à dire les id
    var new_pwd = $('#new-pwd');
    var confirm_pwd = $('#confirm-pwd');

    //Récuperation des valeurs de ces inputs
    var new_pwd_value = $('#new-pwd').val();
    var confirm_pwd_value = $('#confirm-pwd').val();

    //verification du mot de passe
    if (new_pwd_value === "") {
        new_pwd.removeClass('is-valid');
        new_pwd.addClass("is-invalid");
        $('#error-change-password').text("Mot de passe est obligatoire");
        new_pwd.focus();
    } else if (!passwordVerif(new_pwd_value)) {
        new_pwd.removeClass('is-valid');
        new_pwd.addClass("is-invalid");
        $('#error-change-password').text("Le mot de passe doit contenir :une lettre majuscule\nune lettre minuscule, un chiffre et les \ncaractères speciaux  taille: (8 à 12 caractères)");
        new_pwd.focus();
    } else {
        $('#error-change-password').text("");
        new_pwd.removeClass('is-invalid');
        new_pwd.addClass('is-valid');

        //verification du mot de passe confirm
        if (confirm_pwd_value === "") {
            confirm_pwd.removeClass('is-valid');
            confirm_pwd.addClass("is-invalid");
            $('#error-change-password-confirm').text("Mot de passe confirmation est obligatoire");
            confirm_pwd.focus();
        } else if (new_pwd_value !== confirm_pwd_value) {
            confirm_pwd.removeClass('is-valid');
            confirm_pwd.addClass("is-invalid");
            $('#error-change-password-confirm').text("Les mots de passe ne sont pas identiques !");
            confirm_pwd.focus();
        } else {
            $('#error-change-password-confirm').text("");
            confirm_pwd.removeClass('is-invalid');
            confirm_pwd.addClass('is-valid');

            //Enregistrement dans la base de donnée
            $('#form-changer-pwd').submit();
        }
    }
}