<?php
require_once("Model.php");

class User extends Model {
    protected static string $table = "users";

    public string $name;
    public string $email;
    public string $password;
    public string $phone;
    public int $is_adult;
    public int $is_admin;

    public function __construct($data = []) {
        $this->name = $data["name"] ?? "";
        $this->email = $data["email"] ?? "";
        $this->password = $data["password"] ?? "";
        $this->phone = $data["phone"] ?? "";
        $this->is_adult = $data["is_adult"] ?? 0;
        $this->is_admin = $data["is_admin"] ?? 0;
    }

    public function toArray(): array {
        return [
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password,
            "phone" => $this->phone,
            "is_adult" => $this->is_adult,
            "is_admin" => $this->is_admin
        ];
    }
}
?>