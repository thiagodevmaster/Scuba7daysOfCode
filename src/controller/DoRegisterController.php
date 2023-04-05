<?php

namespace Scuba\Controller;

use Scuba\helper\FlashMessageTrait;
use Scuba\Repository\UserRepository;
use Scuba\helper\sendConfirmationEmailTrait;

class DoRegisterController extends UserRepository implements Controller
{   
    use FlashMessageTrait;
    use sendConfirmationEmailTrait;

    public function do_process_request()
    {
        $name = filter_input(INPUT_POST, "name");
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, "password");
        $password_confirm = filter_input(INPUT_POST, "password-confirm");
        
        $password_hash = password_hash($password, PASSWORD_ARGON2ID);

        if($name === false){
            $this->addErrorMessageName('Insira um nome válido !');
            header('Location: /register', response_code:302);
            return;
        }

        if($email === false){
            $this->addErrorMessageEmail('Insira um email válido !');
            header('Location: /register', response_code:302);
            return;
        }

        if($password === false || $password_confirm !== $password || strlen($password) <= 10){
            $this->addErrorMessagePassword('Senhas incompatíveis ou com menos de 10 caracteres');
            header('Location: /register', response_code:302);
            return;
        }

        $user_data = [
            "name" => $name,
            "email" => $email,
            "password" => $password_hash,
            "mail_validation" => false
        ];

        if($this->sendEmail($email, $name) === true){
            if($this->addUser($user_data) === true){
                $this->addSuccessMessage("Usuário inserido com sucesso!\nConfirme seu e-mail!");
                header('Location: /login', response_code:302);
            }else{
                $this->addErrorMessage("Usuario \"$email\" já existe. Tente novamente!");
                header("Location: /register", response_code:302);
            }
        }else{
            $this->addErrorMessage("Falha no envio de Email de confirmação");
            header("Location: /register", response_code:302);
        }
        
    }
}