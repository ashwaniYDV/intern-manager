<?php
ini_set('display_errors',1);
class Professor{
    private $conn;
    
    private $table_name = 'Professors';
    
    public $id;
    public $name ;
    public $email;
    public $hashed_password;
    public function __construct($db,$data)
    {
        $this->conn = $db ;
        $this->name = $data->name;
        $this->email = $data->email;
        $this->hashed_password = password_hash($this->hashed_password, PASSWORD_BCRYPT);        
    }
    public function register_prof()
    {
        $query = "INSERT INTO " . $this->table_name . " SET name = ?,email = ?,password = ? ";
        $stmt = $this->conn->prepare($query);
        $this->name = htmlspecialchars($this->name);
        $this->email = htmlspecialchars($this->email);
        $this->hashed_password = htmlspecialchars($this->hashed_password);
        if ($stmt->execute([$this->name, $this->email, $this->hashed_password])) {
            return true;
        }
        return false;
    }
    public function  noEmptyFields()
    {
        if (empty($this->name) || empty($this->email)  || empty($this->hashed_password)) {
            return 0;
        }
        return 1;
    }
}
