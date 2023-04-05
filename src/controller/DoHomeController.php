<?php

namespace Scuba\Controller;

use Scuba\helper\RenderViewTrait;
use Scuba\Repository\UserRepository;

class DoHomeController extends UserRepository implements Controller
{
    use RenderViewTrait;

    public function do_process_request()
    {
        $email = filter_input(INPUT_GET, 'email');
        $emailDecode = base64_decode($email);
        $user = $this->findByEmail($emailDecode);
        
        echo $this->render_view('home', [
            'user' => $user
        ]);
    }
}