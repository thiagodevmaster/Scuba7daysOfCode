<?php

namespace Scuba\Controller;

class DoRegisterController implements Controller
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

        $jason = json_encode($user_data, JSON_PRETTY_PRINT);

        $path = __DIR__ . '/../../data/users.json';

        $file = fopen($path, 'a');
        fwrite($file, $jason);
        fclose($file);
        header('Location: /login', response_code:302);

    }
}