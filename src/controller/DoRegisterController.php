<?php

namespace Scuba\Controller;

use Scuba\Repository\UserRepository;

class DoRegisterController extends UserRepository implements Controller
{

    public function do_process_request()
    {
        $name = filter_input(INPUT_POST, "name");
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, "password");
        $password_confirm = filter_input(INPUT_POST, "password-confirm");
        
        $password_hash = password_hash($password, PASSWORD_ARGON2ID);

        if($name === false){
            header('Location: /register', response_code:302);
            return;
        }

        if($email === false){
            header('Location: /register', response_code:302);
            return;
        }

        if($password === false || $password_confirm !== $password){
            header('Location: /register', response_code:302);
            return;
        }

        $user_data = [
            "name" => $name,
            "email" => $email,
            "password" => $password_hash
        ];

        $this->addUser($user_data);
         

        header('Location: /login', response_code:302);

    }
}