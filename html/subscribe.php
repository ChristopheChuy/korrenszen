<?php
header('Content-type: text/html; charset=UTF-8'); 
?>
<?php 
  session_start(); 
  if($_SESSION['pseudo_user'] == "")
    include("../php/initialiseSessions.php");
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" href="../css/style_connexion.css">

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/normalize.css" />	
    <link rel="stylesheet" type="text/css" href="../css/demo.css" />
    <link rel="stylesheet" type="text/css" href="../css/set1.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="../js/jquery-3.1.0.min.js"></script>
    <script src="../js/sweetalert.min.js"></script> 
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        
    <link rel="stylesheet" type="text/css" href="../css/sweetalert.css">
</head>
<body>
    <div class="container-fluid">
			<div class="col-md-3"></div>
            <div class="col-md-6">
            
                <section class="content bgcolor-1">
                    
                    <div class="contenu_form">
                        <form action="javascript:inscription()" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="row">
                            <span class="input input--haruki">
                                <input class="input__field input__field--haruki" type="text" id="input-1" />
                                <label class="input__label input__label--haruki" for="input-1">
                                    <span class="input__label-content input__label-content--haruki">Pseudo</span>
                                </label>
                            </span>
                        </div>
                        <br/><br/>
                        <div class="row">
                            <span class="input input--haruki">
                                <input class="input__field input__field--haruki" type="mail" id="input-2" />
                                <label class="input__label input__label--haruki" for="input-2">
                                    <span class="input__label-content input__label-content--haruki">Login / Mail</span>
                                </label>
                            </span>
                        </div>
                        <br/><br/>
                        <div class="row">
                            <span class="input input--haruki">
                                <input class="input__field input__field--haruki" type="password" id="input-3" />
                                <label class="input__label input__label--haruki" for="input-3">
                                    <span class="input__label-content input__label-content--haruki">Mot de Passe</span>
                                </label>
                            </span>
                        </div>
                        <br/>
                        <center><button type="submit" id="Submit" value="Submit" name="Submit" style="background-color:transparent;border-color:transparent;border-top:4px solid #6a7989;border-bottom:4px solid #6a7989;width:200px; height:50px; border-radius:0px; color:#6a7989;" class="btn btn-primary">S'inscrire</button></center>
                        </form>
                        <br/>
                        <center><button style="background-color:transparent;border-color:transparent;border-top:4px solid #6a7989;border-bottom:4px solid #6a7989;width:200px; height:50px; border-radius:0px; color:#6a7989;" class="btn btn-primary" id="connexion">Se connecter</button></center>
                    </div>
                        
                    
                    
                    
                </section>
            
            
                </div>
        <div class="col-md-3"></div>
			
		</div><!-- /container -->
		<script src="../js/classie.js"></script>
		<script>
			(function() {
				// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
				if (!String.prototype.trim) {
					(function() {
						// Make sure we trim BOM and NBSP
						var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
						String.prototype.trim = function() {
							return this.replace(rtrim, '');
						};
					})();
				}

				[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
					// in case the input is already filled..
					if( inputEl.value.trim() !== '' ) {
						classie.add( inputEl.parentNode, 'input--filled' );
					}

					// events:
					inputEl.addEventListener( 'focus', onInputFocus );
					inputEl.addEventListener( 'blur', onInputBlur );
				} );

				function onInputFocus( ev ) {
					classie.add( ev.target.parentNode, 'input--filled' );
				}

				function onInputBlur( ev ) {
					if( ev.target.value.trim() === '' ) {
						classie.remove( ev.target.parentNode, 'input--filled' );
					}
				}
			})();
		</script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>     
    <script src="../js/inscription.js"></script>

</body>
</html>