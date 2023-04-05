<?php

namespace Scuba\Controller;

use Scuba\Repository\UserRepository;

class DoDeleteUserController extends UserRepository implements Controller
{
    public function do_process_request()
    {
        $email = filter_input(INPUT_GET, 'email');

        $this->deleteByEmail($email);

        header('Location: /logout', response_code:302);
    }
}