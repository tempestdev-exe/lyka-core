<?php

/**
 * Class Response
 *
 * @package ryanp\lykacore
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace ryanp\lykacore;

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