<?php
if(isset($_POST['email'])) {
    
    
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "shop@megawood.rs";
    $email_subject = "Poruka korisnika sajta MEGAWOOD.RS";
 
    function died($error) {
        // your error code can go here
        echo "Žao nam je ali je došlo do greške prilikom slanja poruke, molimo proverite da li ste ukucali sva polja.";
        echo "Došlo je do sledećih grešaka.<br /><br />";
        echo $error."<br /><br />";
        echo "Molimo vas vratite se nazad i pokušajte ispraviti greške<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('Žao nam je ali je došlo do greške prilikom slanja poruke, molimo proverite da li ste ukucali sva polja.');       
    }
 
     
 
    $first_name = $_POST['first_name']; // required
    
    $email_from = "shop@megawood.rs"; // required
    
    $korisnik = $_POST['email'];
    
    $comments = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'Ukucali ste pogrešan format email adrese. <br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'Došlo je do greške. Vaše ime može sadržati samo velika i mala slova<br />';
  }
 
 
  if(strlen($comments) < 12) {
    $error_message .= 'Broj karaktera nije dovoljan da bi se poslala poruka.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "e-mail sa sajta MEGAWOOD.RS";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "\n Ime: ".clean_string($first_name)."\n";
  
    $email_message .= "Korisnikov mail: ".clean_string($korisnik)."\n\n";

    $email_message .= "Poruka: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 


 
<?php
echo '<meta charset="utf-8" />';
    echo '<h1 style="text-align: center;">Slanje poruke je uspelo.<h1>';
    echo '<h2 style="text-align: center;"> Potrudićemo se da u što kraćem roku odgovorimo na Vašu poruku. </h2>';
 echo '<p style="text-align: center;"><a href="http://www.megawood.rs" target="_blank">Nazad na početnu stranicu</a></p>';
}
?>