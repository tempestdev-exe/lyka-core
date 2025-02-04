<?php

/**
 * Class UserModel
 *
 * @package paprikadev\paprikacore
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace paprikadev\paprikacore;

use paprikadev\paprikacore\db\DBModel;

abstract class UserModel extends DBModel
{
    abstract public function getDisplayName(): string;
}