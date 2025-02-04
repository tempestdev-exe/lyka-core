<?php

/**
 * Class ForbiddenException
 *
 * @package paprikadev\paprikacore\exception
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace paprikadev\paprikacore\exception;

class ForbiddenException extends \Exception
{
    protected $message = 'You do not have permission to access this page';
    protected $code = 403;
}