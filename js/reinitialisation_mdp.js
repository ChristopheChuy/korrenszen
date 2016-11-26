function checkPass(){
    $champA = $("#password").val();
    $champB = $("#confirmpassword").val();
    
    if($champA == $champB && $champB != ''){
         $(".confirmpass").html("mot de passe identique");
       $(".testpassfaux").css('display','none'); $(".testpassreussi").css('display','');
        
    }else{
		if($champB != ''){
			$(".confirmpass").html("mot de passe non identique");
			$(".testpassreussi").css('display','none'); $(".testpassfaux").css('display','');
		}else{
			
		}
        
    }
    
}
function changementmdp(){
    $clef=$("#clef").val();
    $password=$("#password").val();
    $passwordconfirm=$("#confirmpassword").val();
      
    if($clef !='' && $password !='' && $passwordconfirm !=''){
        if($password == $passwordconfirm){
            if($clef.length == 32){
                $.ajax({
                url: '../php/changement_mdp.php',
                type: 'POST',
                dataType: "html",
                data: {
                    password: $password, clef: $clef},
                success: function (response) 
                { 
                    if(response == "cleffausse"){
                       swal(
                           'Oups !',
                           'La clef rentrée est fausse',
                           'error'
                        )}else{
                           swal({
                                title: "Bravo !",   
                                text: "Votre mot de passe à été mis à jour, vous allez être redirigé vers la page de connexion",
                                type: "success",
                               showConfirmButton: false
                           });
                           setTimeout('redirection()', 2000);
                       } 
                    
                },
                error: function(XMLHttpRequest, textStatus, exception) { alert("Ajax failure\n" + errortext); },
                async: true
                });
            }else{
                swal(
               'Oups !',
               'La clef rentrée est fausse',
               'error'
                )
            }
             
        }else{
            swal(
               'Oups !',
               'Vous n\'avez pas correctement confirmé votre nouveau mot de passe',
               'error'
            )
        }
       
    }else{
       swal(
       'Oups !',
       'Vous n\'avez pas complété parfaitement tous les champs',
           'error'
       ) 
    }
    
    
}

function redirection(){
    document.location.href="login.php";
}