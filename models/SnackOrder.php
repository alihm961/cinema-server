<?php
require_once(__DIR__ . "/Model.php");

class SnackOrder extends Model {
    private int $id;
    private int $booking_id;
    private string $snack_name;
    private int $quantity;
    private float $price;

    protected static string $table = "snack_orders";

    public function __construct(array $data) {
        $this->id = $data['id'] ?? 0;
        $this->booking_id = $data['booking_id'];
        $this->snack_name = $data['snack_name'];
        $this->quantity = $data['quantity'];
        $this->price = $data['price'];
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'booking_id' => $this->booking_id,
            'snack_name' => $this->snack_name,
            'quantity' => $this->quantity,
            'price' => $this->price,
        ];
    }
}