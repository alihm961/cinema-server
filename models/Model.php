<?php

abstract class Model{
    protected static string $table;
    protected static string $primary_key = 'id';

    public static function find(mysqli $mysqli, int $id) {

        $sql = sprintf("SELECT * FROM %s WHERE %s = ?", static::$table, static::$primary_key);
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_assoc();
        return $data ? new static($data) : null;
    }

    public static function all(mysqli $mysqli): array {
        $sql = sprintf("SELECT * FROM %s", static::$table);
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        $objects = [];
        while ($row = $result->fetch_assoc()) {
            $objects[] = new static($row);
        }
        return $objects;
    }
}