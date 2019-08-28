<?php
class Student
{
    private $conn;
    private $table_name = 'Students';
    private $id;
    private $name;
    private $email;
    private $branch;
    private $hashed_password;

    public function __construct($db, $data)
    {
        $this->conn = $db;
        $this->name = $data->name;
        $this->email = $data->email;
        $this->branch = $data->branch;
        $this->hashed_password = password_hash($this->hashed_password, PASSWORD_BCRYPT);
    }
    public function register_student()
    {
        $query = "INSERT INTO " . $this->table_name . " SET name = ?,email = ?,branch = ?,password = ? ";
        $stmt = $this->conn->prepare($query);
        $this->name = htmlspecialchars($this->name);
        $this->email = htmlspecialchars($this->email);
        $this->branch = htmlspecialchars($this->branch);
        $this->hashed_password = htmlspecialchars($this->hashed_password);
        if ($stmt->execute([$this->name, $this->email, $this->branch, $this->hashed_password])) {
            return true;
        }
        return false;
    }
    public function  noEmptyFields()
    {
        if (empty($this->name) || empty($this->email) || empty($this->branch) || empty($this->hashed_password)) {
            return 0;
        }
        return 1;
    }
}
