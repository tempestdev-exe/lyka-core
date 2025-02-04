<?php

/**
 * Class UserModel
 *
 * @package ryanp\lykacore
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace ryanp\lykacore;

use ryanp\lykacore\db\DBModel;

abstract class UserModel extends DBModel
{
    abstract public function getDisplayName(): string;
}