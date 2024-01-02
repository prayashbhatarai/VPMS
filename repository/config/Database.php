<?php
class Database
{
    private $servername = "localhost";
    private $username= "root";
    private $dbname="vpms";
    //private $password=""; //For Windows
    private $password="prashant1234"; //For Linux
    
    public function connect()
    {
        try
        {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(PDOException $e) 
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>