<?php
require_once(__DIR__ . "/Model.php");

class Payment extends Model {
    protected int $id;
    protected int $booking_id;
    protected int $user_id;
    protected float $amount;
    protected string $payment_method;

    protected static string $table = "payments";

    public function __construct(array $data) {
        $this->id = $data['id'] ?? 0;
        $this->booking_id = $data['booking_id'] ?? 0;
        $this->user_id = $data['user_id'] ?? 0;
        $this->amount = $data['amount'] ?? 0.0;
        $this->payment_method = $data['payment_method'] ?? 'unknown';
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'booking_id' => $this->booking_id,
            'user_id' => $this->user_id,
            'amount' => $this->amount,
            'payment_method' => $this->payment_method,
        ];
    }

    public function save(mysqli $mysqli): bool {
        $sql = "INSERT INTO payments (id, booking_id, user_id, amount, payment_method) VALUES (?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $mysqli->error);
        }

        $stmt->bind_param("iiids", $this->id, $this->booking_id, $this->user_id, $this->amount, $this->payment_method);
        return $stmt->execute();
    }
}