<?php

namespace Scuba\Controller;

class DoLoginController implements Controller
{
    public function do_process_request()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
       
        $path = file_get_contents(__DIR__ . '/../../data/users.json');
        $usersData = json_decode($path);
        
        
       
        foreach($usersData as $user){
            $correct_password = password_verify($password, $user->password);
            if($email === $user->email && $correct_password === true){
                header('Location: /home');
                return;
            }
        }

        header('Location: /login', response_code:302);
    }
}