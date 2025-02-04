<?php

/**
 * Class ForbiddenException
 *
 * @package ryanp\paprikacore\exception
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace ryanp\paprikacore\exception;

class ForbiddenException extends \Exception
{
    protected $message = 'You do not have permission to access this page';
    protected $code = 403;
}