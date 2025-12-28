<?php

include __DIR__."/../config/database.php";

class Doctor {
    private $id;
    private $full_name;
    private $specialty;
    private $department_id;
    private $email;
    private $phone;

    public function __construct($id, $full_name, $specialty, $department_id , $email, $phone){
        $this->id = $id ;
        $this->full_name = $full_name;
        $this->specialty = $specialty;
        $this->department_id = $department_id ;
        $this->email = $email;
        $this->phone = $phone;
    }

   
    public function getId(){
         return $this->id; 
        }
    public function getFullName(){
         return $this->full_name; 
        }
    public function setFullName($name){ 
        $this->full_name = $name; 
    }
    public function getSpecialty(){
         return $this->specialty;
         }
    public function setSpecialty($s){
         $this->specialty = $s;
         }
    public function getDepartmentId(){
         return $this->department_id; 
        }
    public function setDepartmentId($d){ 
        $this->department_id = (int)$d;
     }
    public function getEmail(){
         return $this->email;
         }
    public function setEmail($e){
         $this->email = $e;
         }
    public function getPhone(){
         return $this->phone;
         }
    public function setPhone($p){ 
        $this->phone = $p;
     }

   
    public function save(){
        global $conn;
        $sth = $conn->prepare("INSERT INTO doctors(full_name, specialty, department_id, email, phone) VALUES (?, ?, ?, ?, ?)");
        $sth->execute([$this->full_name, $this->specialty, $this->department_id, $this->email, $this->phone]);
      
    }


    public function getAll(){
        global $conn;
        $sth = $conn->prepare("SELECT * FROM doctors");
        $sth->execute();
        $result = $sth->fetchAll();
        print_r($result);
    }

    
    public function update(){
     
        global $conn;
        $sth = $conn->prepare("UPDATE doctors SET full_name=?, specialty=?, department_id=?, email=?, phone=? WHERE id=?");
        $sth->execute([$this->full_name, $this->specialty, $this->department_id, $this->email, $this->phone, $this->id]);
       
    }

    
    public function delete(){
      
        global $conn;
        $sth = $conn->prepare("DELETE FROM doctors WHERE id=?");
        $sth->execute([$this->id]);
      
    }
}


$d = new Doctor( "Dr. Ahmed", "Cardiology", 1, "ahmed@example.com", "123456789");
$d->save();


$d->getAll();

$dUpdate = new Doctor(1, "Dr. Ahmed Ali", "Cardiology", 1, "ahmedali@example.com", "987654321");
$dUpdate->update();


$dUpdate->getAll();


$dDelete = new Doctor(1);
$dDelete->delete();

$dDelete->getAll();

?>
