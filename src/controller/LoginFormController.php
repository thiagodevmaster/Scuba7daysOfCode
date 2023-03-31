<?php

namespace Scuba\Controller;

use Scuba\helper\RenderViewTrait;

class LoginFormController implements Controller
{

    use RenderViewTrait;

    public function do_process_request()
    {
        echo $this->render_view('login');
    }
}