<link rel="stylesheet" href="style.css">
<?php




// Upload file
if(isset($_POST['but_submit'])){
        
        if($_FILES['file']['name'] != ''){
                $uploadedfile = $_FILES['file'];
                $upload_overrides = array( 'test_form' => false );
                $extensionFichier = $elementsChemin['extension'];
                $extensionsAutorisees = array('jpeg', 'jpg', 'gif', 'png', 'doc', 'pdf', 'bmp', 'txt', 'svg');
                
                $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
                $imageurl = "";
                if ( $movefile && ! isset( $movefile['error'] ) ) {
                        $imageurl = $movefile['url'];
                        echo 'Nous avons sauvegardé votre fichier de '.$_FILES['file']['size'].' octets';
                        echo '</br></br> merci '.$_POST['email'].' nous avons envoyé un mail à '.$_POST['mailToSend'].'</br>';
                        echo "url : ".$imageurl;
                } else {
                        echo $movefile['error'];
                }
        }
        
}

?>
<h1>Envoi de fichier</h1>


<form method="post" action="" name="myform" enctype="multipart/form-data">
<p>Tous les champs sont obligatoires</p>
<input type="file" name = "file"/></br>
<input type="hidden" name="MAX_FILE_SIZE" value="500000"> <!-- limiter la taille max à 500 ko -->
Votre E-mail : <input class="verif-email" type="email" name="email" required/></br>
Email destinataire : <input class="verif-email" type="email" name="mailToSend" required/></br>
<input type="submit" name="but_submit" value="Envoyer">

