<?php
 
if($_POST) {
    $nome = "";
    $email = "";
    $email_title = "";
    $message = "";
     
    if(isset($_POST['nome'])) {
      $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    if(isset($_POST['email_title'])) {
        $email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
    }
        
    if(isset($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
    }
     
    $recipient = "andreacontest@gmail.com";
    
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'Da: ' . $nome . $email . "\r\n";
     
    if(mail($recipient, 'Richiesta Informazioni', $message, $headers)) {
        echo "<p>Grazie per avermi contattato! Riceverai una risposta il prima possibile.</p>";
    } else {
        echo '<p>La mail non è stata inviata correttamente. Riprova in un secondo momento.</p>';
    }
     
} else {
    echo '<p>Errore. Riprova in un secondo momento.</p>';
}
 
?>