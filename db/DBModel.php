<?php

/**
 * Class DBModel
 *
 * @package app\core
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace app\core\db;

use app\core\Kernel;
use app\core\Model;

abstract class DBModel extends Model
{
    abstract public function tableName(): string;

    abstract public function attributes(): array;

    abstract public function primaryKey(): string;

    public function save()
    {

        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName 
            (".implode(',', $attributes).") 
            VALUES(".implode(',', $params).")");
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();
        return true;
    }

    public function findOne($where) // [email => 'value', firstname => 'value']
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }

        $statement->execute();
        return $statement->fetchObject(static::class);
    }

    public static function prepare($sql)
    {
        return Kernel::$kernel->db->pdo->prepare($sql);
    }
}