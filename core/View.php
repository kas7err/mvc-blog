<?php

namespace Core;

class View
{

    public static function render($template, $args = [])
    {
        static $blade = null;

        if ($blade === null) {
            $blade = new \Jenssegers\Blade\Blade(dirname(__DIR__) . '/app/views', dirname(__DIR__) . '/cache/views');
        }

        echo $blade->render($template, $args);
    }
}
