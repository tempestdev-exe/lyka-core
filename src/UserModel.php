<?php

/**
 * Class UserModel
 *
 * @package ryanp\paprikacore
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace ryanp\paprikacore;

use ryanp\paprikacore\db\DBModel;

abstract class UserModel extends DBModel
{
    abstract public function getDisplayName(): string;
}