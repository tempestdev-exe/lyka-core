<?php

/**
 * Class BaseGate
 *
 * @package paprikadev\paprikacore\middleware
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace paprikadev\paprikacore\middleware;

abstract class BaseGate
{
    abstract public function execute();
}