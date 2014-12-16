<?php if(isset($_POST["email"])):

    /* Construction du message */
    $email_visiteur = $_POST["email"];
    $to = "contact@monsite.com";

    $nom = $_POST["nom"];
    $sujet = $_POST["sujet"];
    $message = $_POST["message"];

    $date = date('j F Y G:i:s');
    $ip = $_SERVER["REMOTE_ADDR"];

    $msg .= "<html>";
    $msg .= "<head>";
    $msg .= "<title>".$sujet."</title>";
    $msg .= "</head>";
    $msg .= "</body>";
    $msg .= "De : ".$nom." <".$email_visiteur.">\r\n<br />";
    $msg .= "Date : ".$date."\r\n<br />";
    $msg .= "Sujet : ".$sujet."\r\n<br />";
    $msg .= "Corps du message : ".$message."\r\n<br />";
    $msg .= "IP de l'expéditeur : ".$ip."\r\n<br />";
    $msg .= "</body>";
    $msg .= "</html>";


    /* En-têtes de l'e-mail */
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'To: '.$nom.' <'.$email_visiteur.'>' . "\r\n";
    $headers .= 'From: '.$nom.' <'.$email_visiteur.'>' . "\r\n";
     
    /* Envoi de l'e-mail */
    mail($to, $sujet, $msg, $headers);
endif;

?>
<?php include("include/head1.php"); ?>
        <title>Contact</title>
<?php include("include/head2.php"); ?>
        <?php include("include/header.php"); ?>
        <section class="container">
            <article class="col-sm-4 col-xs-12 mt-20">
                <iframe class="mt-20" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2531.4264868375894!2d3.059696!3d50.6191936!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c2d5980d61fc93%3A0xb1e507520b8bf88e!2s11+Rue+Albert+Samain%2C+59000+Lille!5e0!3m2!1sfr!2sfr!4v1415797077445" width="100%" height="450" frameborder="0" style="border:0"></iframe>
            </article>
            <article class="col-xs-12 col-sm-8 mt-20">
                <form class="contact" method="post" action="contact.php">
                    <h2>Contactez-nous </h2>
                    <div class="display_none">
                        <input type="hidden" value="1" name="contactez_norlicom">
                    </div>
                    <div class="form_content">
                        <div class="col-xs-12">
                            <label for="nom">Votre nom (obligatoire) :</label>
                            <input type="text" placeholder="Mon nom" size="40" name="nom" id="nom">
                        </div>
                        <div class="col-xs-12">
                            <label for="email" class="clear">Adresse email (obligatoire) :</label>
                            <input type="email" size="40" placeholder="adresse@email.com" name="email" id="email">
                        </div>
                        <div class="col-xs-12">
                            <p id="veritable_adresse_email" class="align_right clear">Merci d'indiquer votre VÉRITABLE adresse e-mail, sans quoi nous ne pourrons pas vous répondre.</p>
                            <label for="sujet">Sujet (obligatoire) :</label>
                            <select class="" name="sujet" id="sujet">
                                <option value="">---</option>
                                <option value="Partenariat.">Partenariat.</option>
                                <option value="demander à être recontacté.">demander à être recontacté.</option>
                                <option value="Signaler un problème.">Signaler un problème.</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>
                        <div class="col-xs-12">
                            <label for="message">Votre message :</label>
                        </div>
                        <div class="col-xs-12">
                            <textarea class="" rows="10" cols="40" name="message" id="message" placeholder="Votre message ici"></textarea>
                        </div>
                        <div class="col-xs-12">
                            <input type="submit" id="submit" value="Envoyer" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </article>
        </section>
        
        <?php include("include/footer.php"); ?>