<?php

namespace Scuba\helper;

use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once __DIR__ . "/../../config/config.php";

trait sendConfirmationEmailTrait 
{
    public function sendEmail(string $to, $name): bool
    {
        $mail = new PHPMailer(true);

        try{
            $this->serverSettings($mail);
            $this->setRecipients($mail, $to, $name);
            $this->setContent($mail, $to);
            
            $mail->send();
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    private function serverSettings(PHPMailer $mail)
    {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        $mail->isSMTP(); 
        $mail->Host = HOST;
        $mail->SMTPAuth = true;
        $mail->Username = USERNAME;
        $mail->Password = PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
        $mail->Port = PORT;
    }

    private function setRecipients(PHPMailer $mail, $to, $name)
    {
        $mail->setFrom('tjesusdantas@gmail.com', 'Thiago Dantas');
        $mail->addAddress($to, $name);
    }

    private function setContent(PHPMailer $mail, $to)
    {
        $token = new CryptoToken();
        $tokenCrypto = $token->encrypter($to);
        $key = base64_encode($token->getKey());

        $result = openssl_decrypt(base64_decode($tokenCrypto), 'aes-128-cbc', base64_decode($key), 0, '');

        // echo "<pre>";
        // var_dump($tokenCrypto);
        // var_dump($key);
        // var_dump($result);
        // echo "resultado: ". $result;
        // echo "</pre>";
        // exit();
        
        $mail->isHTML(true);
        $mail->Subject = 'Confirm Email';
        $mail->Body    = 
        'Esta é uma mensagem de confirmação, por favor clique no link abaixo para confirmar seu email'."\n".
        "<a href='http://localhost:8080/confirm_email?token=$tokenCrypto&key=$key'>Click to Confirm!</a>";
    }

}