<?php

namespace Scuba\Controller;

use Scuba\helper\RenderViewTrait;

class ForgetPasswordFormController implements Controller
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
        echo $this->render_view('forget_password');
    }
}