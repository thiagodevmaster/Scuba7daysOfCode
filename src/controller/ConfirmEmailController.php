<?php

namespace Scuba\Controller;

use Scuba\helper\FlashMessageTrait;
use Scuba\helper\RenderViewTrait;
use Scuba\Repository\UserRepository;

class ConfirmEmailController extends UserRepository implements Controller
{
    use RenderViewTrait;

    public function do_process_request()
    {
        if(isset($_SESSION['logged'])){
            if($_SESSION['logged'] === true){
                header("Location: /home", response_code:302);
                return;
            }
        }

        $token = filter_input(INPUT_GET, 'token');
        $key = filter_input(INPUT_GET, 'key' );
        $result = openssl_decrypt(base64_decode($token), 'aes-128-cbc', base64_decode($key), 0, '');
        
        $this->updateStatusConfirmEmail($result);
        
        echo $this->render_view('confirmEmail');
        
    }
}