<?php

/**
 * Class UserModel
 *
 * @package app\core
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace app\core;

use app\core\db\DBModel;

abstract class UserModel extends DBModel
{
    abstract public function getDisplayName(): string;
}