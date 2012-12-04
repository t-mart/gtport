<?php  
require_once 'database.php';  
  
  
class User {  
  
    public $id;  
    public $username;  
    public $password;  
    public $type;
    
    //constructor that creates new user object. if field is not set, set to empty string
    function __construct($data) {  
        $this->id = (isset($data['id'])) ? $data['id'] : "";  
        $this->username = (isset($data['username'])) ? $data['username'] : "";  
        $this->password = (isset($data['password'])) ? $data['password'] : "";  
        $this->type = (isset($data['type'])) ? $data['type'] : "";  
    }  
  

     
}  
  
?>  