<?php

/**
 * Class ForbiddenException
 *
 * @package app\core\exception
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace app\core\exception;

class ForbiddenException extends \Exception
{
    protected $message = 'You do not have permission to access this page';
    protected $code = 403;
}