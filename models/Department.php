<?php 

include __DIR__."/../config/database.php";

class Department {
    private $id;
    private $name;

    public function __construct($id,$name){
        $this->name = $name;
        $this->id = $id;   
    }

    public function getId(){
       return $this->id;
    }

    public function  getName() {
        return $this->name;
        
    }

    public function  setName($n) {
        $this->name = $n;
        
    }

    public function getAll(){
        global$conn;
        $sth = $conn->prepare("SELECT * FROM departments");
        $sth->execute();
        $result = $sth->fetchAll();
        print_r($result);

    }
   public function save(){
      global$conn;
    
        $sth = $conn->prepare("INSERT  INTO departments(name) VALUES(?) ");
        
        $sth->execute([$this->name]);
      
   }

   public function update(){
    global$conn;
    $sth = $conn->prepare("UPDATE departments set name=? where id=? ");
    $sth->execute([$this->id,$this->name]);

   }

   public function delete(){
    global$conn;
    $sth = $conn->prepare("DELETE from departments where id=?");
    $sth->execute([$this->id]);

   }

}


 



?>


