<?php

namespace Scuba\Controller;


class DoLogoutController implements Controller
{

    public function do_process_request()
    {
        session_destroy();
        header('Location: /login', response_code:302);
    }
}