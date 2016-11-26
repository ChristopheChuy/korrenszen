function testconnexion(){
   
    $password=$("#input-2").val();
    $email=$("#input-1").val();
    if($password !='' && $email !=''){
            $.ajax({
                url: '../php/connexion.php',
                type: 'POST',
                dataType: "html",
                data: {
                    password: $password, email: $email},
                success: function (response) 
                { 
                    if(response == "error"){
                       swal(
                           'Oups !',
                           'Le mail ou le mot de passe est incorrecte',
                           'error'
                        )}else{
                           swal({
                                title: "Bravo !",   
                                text: "Vous êtes connecté !!",
                                type: "success",
                                showConfirmButton: false
                           });
                           setTimeout('redirection()', 1000);
                       } 
                    
                },
                error: function(XMLHttpRequest, textStatus, exception) { alert("Ajax failure\n" + errortext); },
                async: true
        });   
    }else{
       swal(
       'Oups !',
       'Vous n\'avez pas complété parfaitement tous les champs',
           'error'
       ) 
    }
    
    
}

function redirection(){
    document.location.href="type_voyage.php";
}

$("#inscrire").click(function(){
   
   document.location.href="subscribe.php"; 
});
$("#mdpoublie").click(function(){
        swal({
          title: 'Entrez votre Email',
          input: 'email',
          showCancelButton: true,
          cancelButtonText: 'Annuler',
          confirmButtonText: 'Envoyer',
          showLoaderOnConfirm: true,
          preConfirm: function(email) {
            return new Promise(function(resolve, reject) {
              setTimeout(function() {
                       $.ajax({
                        url: '../php/oublie_mdp_envoi.php',
                        type: 'POST',
                        dataType: "html",
                        data: {
                            email: email},
                        success: function (response) 
                        { 
                            if(response == "error"){
                               swal(
                                   'Oups !',
                                   'L\'adresse mail entrée n\'existe pas',
                                   'error'
                                )}else if(response == "demandefaite"){
                                   swal(
                                   'Oups !',
                                   'Vous avez déja fait une demande de réinitialisation de mot de passe ',
                                   'error'
                                )
                               }else{
                                   resolve();
                               }

                        },
                        error: function(XMLHttpRequest, textStatus, exception) { alert("Ajax failure\n" + errortext); },
                        async: true
                        });   
              }, 2000)
            })
          },
          allowOutsideClick: false
        }).then(function(email) {
          swal({
            type: 'success',
            title: 'Envoyé !',
            html: 'Vous recevrez d\ici peu un mail contenant votre mot de passe à l\'adresse mail: ' + email
          })
        });
});