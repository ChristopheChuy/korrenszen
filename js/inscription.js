function inscription(){
    $pseudo=$("#input-1").val();
    $email=$("#input-2").val();
    $password=$("#input-3").val(); 
    if( $pseudo !='' && $password !=''  && $email !=''){
            $.ajax({
                url: '../php/inscription.php',
                type: 'POST',
                dataType: "html",
                data: {
                    pseudo: $pseudo, password: $password, email: $email},
                success: function (response) 
                { 
                    if(response == "mailutilise"){
                       swal(
                           'Oups !',
                           'Ce mail est déja utilisé',
                           'error'
                        )}else{
                           swal({
                                title: "Bravo !",   
                                text: "Vous êtes inscrits !!",
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

$("#connexion").click(function(){
   
   document.location.href="index.php"; 
});
