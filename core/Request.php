<?php

namespace Core;

require INC_ROOT . '/app/helpers/sanitize.php';

class Request
{
    private array $params;

    public function __construct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->params = $_POST;
        } else {
            if (isset($_SERVER['QUERY_STRING'])) {
                $queries = array();
                parse_str($_SERVER['QUERY_STRING'], $queries);
                $this->params = $queries;
            }
        }
    }

    public function getPath(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $query = strpos($path, '?');
        if ($query === false) {
            return $path;
        }
        return substr($path, 0, $query);
    }

    public function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function has($str): bool
    {
        return array_key_exists($str, $_POST);
    }

    public function get($str): string
    {
        return $_POST[$str] ?? $_GET[$str];
    }

    public function all(): array
    {
        return sanitize($this->params, trim:false);
    }
}
