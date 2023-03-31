<?php

namespace Scuba\helper;

trait RenderViewTrait
{
    private const TEMPLATE_PATH = __DIR__ . "/../../view/";

    public function render_view(string $template, array $context = []): string
    {
        extract($context);
        ob_start();
        require_once self::TEMPLATE_PATH . "$template" . '.php';
        return ob_get_clean();
    }
}