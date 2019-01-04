
<?php

// if(isset($_POST['but_submit'])){
    
        if (isset($_POST['but_submit'])){
            $nomOrigine = $_FILES['file']['name'];
            $elementsChemin = pathinfo($nomOrigine);
            $extensionFichier = $elementsChemin['extension'];
            $extensionsAutorisees = array('jpeg', 'jpg', 'gif', 'png', 'doc', 'pdf', 'bmp', 'txt', 'svg');
            
            if (isset($_FILES['file'])) {
                if (!(in_array($extensionFichier, $extensionsAutorisees))) {
                    echo "Le fichier n'a pas l'extension attendue.</br>";
                    echo "L'extension ".$elementsChemin['extension']." n'est pas autorisé!"; 
                    ?><form>
                    <input type="button" value="Retour" onclick="history.go(-1)">
                    </form><?php
                } else {
                    // Copie dans le repertoire du script avec un nom en incluant l'heure
                    
                    $repertoireDestination = dirname(__FILE__).'/upload/';
                    // $nomDestination = '';
                    
                    if (move_uploaded_file($_FILES['file']['tmp_name'],
                    $repertoireDestination.$nomOrigine)) {
                        echo 'Nous avons sauvegardé votre fichier de '.$_FILES['mfile']['size'].' octets sous le nom '.$nomOrigine;
                        echo '</br></br> merci '.$_POST['email'].' nous avons envoyé un mail à '.$_POST['mailToSend'];
                        ?>
                        <form></br>
                        <input type="button" value="Retour" onclick="history.go(-1)">
                        </form>
                        <?php
                        // echo 'Le fichier temporaire '.$_FILES['file']['tmp_name'].
                        // ' a été déplacé vers '.$repertoireDestination.$nomDestination;
                        
                        $mail = $_POST['mailToSend'];
                        $passage_ligne = "\r\n";
                        $boundary = '-----='.md5(rand());
                        $subjet = 'Un fichier vous attends!';
                        
                        //=====Création du header de l'e-mail
                        $header = 'From: '.$_POST['mailToSend'].$passage_ligne;
                        // $header .= 'MIME-Version: 1.0'.$passage_ligne;
                        $header .= 'Content-type: text/html; charset=UTF-8' .$passage_ligne;
                        //==========
                        
                        $message = 'Vous recevez cet email de la part de '.$_POST['email'].'qui vient de vous envoyer un un fichier. Pour le récupérer suivez ce lien '.$repertoireDestination.$nomOrigine;
                        
                        //====Envoi du mail
                        mail($mail, $subjet, $message, $header);
                    } else {
                        echo "Le fichier n'a pas été uploadé (trop gros ?) ou ".
                        'Le déplacement du fichier temporaire a échoué'.
                        " vérifiez l'existence du répertoire ".$repertoireDestination.'</br>'; 
                        ?><form>
                        <input type="button" value="Retour" onclick="history.go(-1)">
                        </form><?php
                    }
                }
            }
            
            
        }
        
        

if (! (isset($_POST['but_submit']))){        
  
// <link rel="stylesheet" href="style.css">

?><form method="POST" action="" enctype="multipart/form-data">
<p>Tous les champs sont obligatoires</p>
<input type="file" name = "file"/></br>
<input type="hidden" name="MAX_FILE_SIZE" value="500000"> <!-- limiter la taille max à 500 ko -->
Votre E-mail : <input class="verif-email" type="email" name="email" required/></br>
Email destinataire : <input class="verif-email" type="email" name="mailToSend" required/></br>
<input type="submit" name="but_submit" value="Envoyer">

</form>
<?php }