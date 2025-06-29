<?php
require_once("Model.php");

class SnackOrder extends Model {
    protected static string $table = "snack_orders";

    public int $user_id;
    public string $snack_name;
    public int $quantity;
    public float $price;

    public function __construct($data = []) {
        $this->user_id = $data["user_id"] ?? 0;
        $this->snack_name = $data["snack_name"] ?? "";
        $this->quantity = $data["quantity"] ?? 1;
        $this->price = $data["price"] ?? 0.0;
    }

    public function toArray(): array {
        return [
            "user_id" => $this->user_id,
            "snack_name" => $this->snack_name,
            "quantity" => $this->quantity,
            "price" => $this->price
        ];
    }
}
?>