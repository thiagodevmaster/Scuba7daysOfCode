<?php

namespace Scuba\Controller;

use Scuba\helper\RenderViewTrait;

class NotFoundController implements Controller
{
    use RenderViewTrait;

    public function do_process_request()
    {
        echo $this->render_view('not_found', [http_response_code(404)]);
    }
}