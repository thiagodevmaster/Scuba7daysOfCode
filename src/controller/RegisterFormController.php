<?php

namespace Scuba\Controller;

use Scuba\helper\RenderViewTrait;

class RegisterformController implements Controller
{
    use RenderViewTrait;

    public function do_process_request()
    {
        echo $this->render_view('register');
    }
}