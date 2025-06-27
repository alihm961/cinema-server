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

    public function save(mysqli $mysqli): bool {
    $data = $this->toArray();  // Only get defined public fields
    $columns = implode(", ", array_keys($data));
    $placeholders = rtrim(str_repeat("?, ", count($data)), ", ");

    $sql = "INSERT INTO " . static::$table . " ($columns) VALUES ($placeholders)";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        throw new Exception("prepare failed: " . $mysqli->error);
    }

    $types = "";
    $values = [];

    foreach ($data as $value) {
        if (is_int($value)) {
            $types .= "i";
        } elseif (is_float($value)) {
            $types .= "d";
        } else {
            $types .= "s";
        }
        $values[] = $value;
    }

    $stmt->bind_param($types, ...$values);
    return $stmt->execute();
}
}