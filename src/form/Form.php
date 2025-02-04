<?php

/**
 * Class Form
 *
 * @package ryanp\paprikacore\form
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace ryanp\paprikacore\form;

use ryanp\paprikacore\Model;

class Form
{
    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function field(Model $model, $attribute)
    {
        return new InputField($model, $attribute);
    }
}