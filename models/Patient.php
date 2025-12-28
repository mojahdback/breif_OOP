<?php
require_once __DIR__ . '/../config/database.php';

class Patient
{
    private $id;
    private $full_name;
    private $gender;
    private $date_of_birth;
    private $email;
    private $phone;

    public function __construct($full_name = NULL ,$gender = NULL ,$date_of_birth = NULL ,$email = NULL ,$phone = NULL)
    {
        $this->full_name = $full_name;
        $this->gender = $gender;
        $this->date_of_birth = $date_of_birth;
        $this->email = $email;
        $this->phone = $phone;  

    }


    public function save()
    {
       $db = Database::getConnection();
        $sql = "INSERT INTO patients (full_name,gender,date_of_birth,email,phone) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        return $stmt->execute([$this->full_name, $this->gender,$this->date_of_birth,$this->email,$this->phone]);
    }

    public static function all()
    {
       $db = Database::getConnection();
        $stmt = $db->query("SELECT * FROM patients");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public static function find($id)
    {
       $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM patients WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public static function update($id,$full_name ,$gender ,$date_of_birth,$email,$phone )
    {
       $db = Database::getConnection();
        $stmt = $db->prepare(
            "UPDATE patients SET full_name = ?, gender = ?,date_of_birth = ?,email = ?, phone=? WHERE id = ?"
        );
        return $stmt->execute([$full_name ,$gender ,$date_of_birth,$email,$phone,$id]);
    }


    public static function delete($id)
    {
       $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM patients WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
