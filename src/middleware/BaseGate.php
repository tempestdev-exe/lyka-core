<?php

/**
 * Class BaseGate
 *
 * @package ryanp\lykacore\middleware
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace ryanp\lykacore\middleware;

abstract class BaseGate
{
    abstract public function execute();
}