<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['birthdate'])     ||
   empty($_POST['vatsim'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "Preencha os campos obrigatórios!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$vatsim = strip_tags(htmlspecialchars($_POST['phone']));
$city = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'admin@nordestina-va.net.br'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Formulário de contato:  $name";
$email_body = "Você recebeu uma mensagem do formulário Voe Conosco do site.\n\n"."Seguem detalhes:\n\nNome: $name\n\nEmail: $email_address\n\nData de nascimento: $birthdate\n\nID Vatsim:\n$vatsim\n\nCidade: $city\n\nEstado: $state\n\nHub: $hub\n\n";
$headers = "From: noreply@nordestina-va.net.br\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>
