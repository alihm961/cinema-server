<?php
require_once ("Model.php");

class Snack extends Model {
  protected static string $table = "snacks";

  public string $name;
  public float $price;

  public function __construct($data = []) {
    $this->name = $data["name"] ?? "";
    $this->price = $data["price"] ?? 0.0;
  }

  public function toArray(): array {
    return [
      "name" => $this->name,
      "price" => $this->price
    ];
  }
}
?>