<?php


class DB {  
  
    protected $db_host = '127.0.0.1';  
    protected $db_name = 'psmith44';  
    protected $db_user = 'psmith44';  
    protected $db_pass = '4400password';  
    
    //connect to db
    public function connect() {  
        $connection = mysql_connect($this->db_host, $this->db_user, $this->db_pass);  
        mysql_select_db($this->db_name);  
        
        return true;  
    }  
    
    
    public function processRowSet($rowSet, $singleRow=false)  
    {  
        $resultArray = array();  
        while($row = mysql_fetch_assoc($rowSet))  
        {  
            array_push($resultArray, $row);  
        }  
  
        if($singleRow === true)  
            return $resultArray[0];  
  
        return $resultArray;  
    }  
    
    public function select($table, $where) {  
        $sql = "SELECT * FROM $table WHERE $where";  
        $result = mysql_query($sql);  
        if(mysql_num_rows($result) == 1)  
            return $this->processRowSet($result, true);  
  
        return $this->processRowSet($result);  
    }  
    
    
}


?>
