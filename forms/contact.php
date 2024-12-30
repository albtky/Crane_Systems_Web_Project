<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Alıcı e-posta adresini tanımlayın
$receiving_email_address = 'alperen.tky06@gmail.com';

// Formdan gelen verileri alın
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$subject = htmlspecialchars($_POST['subject']);
$message = htmlspecialchars($_POST['message']);

// E-posta başlıklarını ayarlayın
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// E-posta içeriğini oluşturun
$email_message = "Gönderen: $name\n";
$email_message .= "E-posta: $email\n\n";
$email_message .= "Mesaj:\n$message\n";

// E-posta gönderimini gerçekleştirin
if (mail($receiving_email_address, $subject, $email_message, $headers)) {
    echo '<h2>Mesajınız başarıyla gönderildi. Teşekkür ederiz!</h2>';
} else {
    echo '<h2>Mesaj gönderilirken bir hata oluştu. Lütfen daha sonra tekrar deneyin.</h2>';
}
?>
