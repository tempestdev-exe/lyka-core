<?php

/**
 * Class Response
 *
 * @package app\core
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace app\core;

class Response
{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    public function redirect(string $string)
    {
        header('Location: ' . $string);
    }

}