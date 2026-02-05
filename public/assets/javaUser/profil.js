$('#edit-profil').click(e => {
    e.preventDefault();//empêche la navigation vers URL

    verificationFormulaire();//appel de la fonction de verication des infos de users

});

function verificationFormulaire() {
     //Récuperation des élements de l'input c'est-à dire via les id
    var description = $('#description');
    var lien = $('#lien');

    //Récuperation des valeurs de ces inputs
    var description_value = $('#description').val();
    var $lien_value = $('#lien').val();

    if($lien_value ===""){
        lien.addClass('is-invalid');
        lien.removeClass('is-valid');
        $('#lien_profil').text('Le lien est obligatoire');
        lien.focus();
    }else{
        lien.addClass('is-valid');
        lien.removeClass('is-invalid');
        $('#lien_profil').text('');

        //Enregistrement dans la base de donnée
        $('#form-modif-profil').submit();
    }
}
