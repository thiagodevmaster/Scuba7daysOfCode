<?php

namespace Scuba\Controller;

use Scuba\helper\RenderViewTrait;

class NotFoundController implements Controller
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
        echo $this->render_view('not_found', [http_response_code(404)]);
    }
}