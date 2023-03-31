<?php

namespace Scuba\Controller;

use Scuba\helper\RenderViewTrait;

class ForgetPasswordFormController implements Controller
{
    use RenderViewTrait;

    public function do_process_request()
    {
        echo $this->render_view('forget_password');
    }
}