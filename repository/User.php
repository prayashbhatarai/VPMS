<?php
class User extends Database
{
    private $tablename;
    public $id;
    public $name;
    public $password;
    public $email;
    
    public function __construct()
    {
        $this->tablename = "user";
    }

    public function validate()
    {
        try
        {
            $query = $this->connect()->prepare("SELECT * FROM $this->tablename WHERE u_email = ?");
            $query->execute(array($this->email));
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            if($query->rowCount() > 0)
            {
                foreach($result as $user)
                {
                    if(password_verify($this->password,$user->u_password))
                    {
                        return($user->u_id);
                    }
                }
            }
            else
            {
                return(0);
            }
        }
        catch(PDOException $e)
        {
            echo "Error : " . $e->getMessage();
        }
    }

    public function add()
    {
        try
        {
            $passwordhash = password_hash($this->password, PASSWORD_DEFAULT);
            $data = array($this->name,$this->email,$passwordhash);
            $query = $this->connect()->prepare("INSERT INTO $this->tablename (u_name, u_email, u_password) VALUES (?,?,?)");
            $query->execute($data);
            if($query->rowCount() > 0)
            {
                return(true);
            }
            else
            {
                return(false);
            }
        }
        catch(PDOException $e)
        {
            echo "Error : " . $e->getMessage();
        }
    }

    public function getAll()
    {
        try
        {
            $query = $this->connect()->prepare("SELECT * FROM $this->tablename");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            if($query->rowCount() > 0)
            {
                return($result);
            }
            else
            {
                return(false);
            }
        }
        catch(PDOException $e) 
        {
            echo "Error : " . $e->getMessage();
        }
    }

    public function getById($id)
    {
        try
        {
            $query = $this->connect()->prepare("SELECT * FROM $this->tablename WHERE uss_id = $id");
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
            if($query->rowCount() > 0)
            {
                return($result);
            }
            else
            {
                return(false);
            }
        }
        catch(PDOException $e) 
        {
            echo "Error : " . $e->getMessage();
        }
    }
    
    public function __destruct()
    {
        
    }
} 
?>