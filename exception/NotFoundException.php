<?php

namespace paprikadev\paprikacore\exception;

class NotFoundException extends \Exception
{
    protected $message = 'Page not found :(';
    protected $code = 404;
}