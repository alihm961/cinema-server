<?php
require_once(__DIR__ . "/Model.php");

class User extends Model {
    private int $id;
    private string $email;
    private string $password;
    private ?string $name;
    private ?string $phone;

    protected static string $table = "users";

    public function __construct(array $data) {
        $this->id = $data['id'] ?? 0;
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->name = $data['name'] ?? null;
        $this->phone = $data['phone'] ?? null;
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'name' => $this->name,
            'phone' => $this->phone
        ];
    }

    public static function getByEmail(mysqli $mysqli, string $email): ?User {
        $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        return $data ? new static($data) : null;
    }

    public function getPassword(): string {
        return $this->password;
    }
}