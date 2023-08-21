<?php

class db
{

    private $servername = "localhost";

    private $username = "root";

    private $password = "";

    private $dbname = "test";

    private $conn;

    function connect()
    {
        
        // connection
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return "Connected successfully";
            // return $conn;
        } catch (PDOException $e) {
            return "Connection failed: " . $e->getMessage();
        }
    }
    
    // function for insert data into table
    function insert($table_name, $field, $value)
    {
        try {
            // prepare sql and bind parameters
            $stmt = $this->conn->prepare("INSERT INTO $table_name ($field)  VALUES (:value)");
            $stmt->bindParam(':value', $value);
            $stmt->execute();
            
            return "New records created successfully";
        } catch (PDOException $e) {
            return "<br>Error: " . $e->getMessage();
        }
    }
    
    // function for select all table data
    function select($table_name)
    {
        $data = [];
        $stmt = $this->conn->prepare("SELECT * FROM $table_name");
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }


    // function for insert data into table
    function delete($table_name,$id){
   
        try {
            // prepare sql and bind parameters
            $sql = "DELETE FROM $table_name WHERE id = :ID";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ID', $id);
            $stmt->execute();
            return "records deleted successfully";
        } catch (PDOException $e) {
            return "<br>Error: " . $e->getMessage();

        }
    }
    

    function update($table_name,$id,$name,$mob){
        try{
        $sql = "UPDATE $table_name SET name = :value, mob = :mobile WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':value', $name);
        $stmt->bindParam(':mobile', $mob);
        
        $stmt->execute();
        echo "records update successfully";
        
        }catch (PDOException $e){
            return "<br>Error: ". $e->getMessage();
        }
    }
    function exec_query($query){
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            echo "execute successfully";
        }catch (PDOException $e){
            return "<br>Error: ". $e->getMessage();
        }
    }
}


?>