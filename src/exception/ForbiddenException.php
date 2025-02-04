<?php

/**
 * Class ForbiddenException
 *
 * @package ryanp\lykacore\exception
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace ryanp\lykacore\exception;

class ForbiddenException extends \Exception
{
    protected $message = 'You do not have permission to access this page';
    protected $code = 403;
}