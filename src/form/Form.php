<?php

/**
 * Class Form
 *
 * @package ryanp\lykacore\form
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace ryanp\lykacore\form;

use ryanp\lykacore\Model;

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