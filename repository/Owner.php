<?php
class Owner extends Database
{
    private $tablename;
    public $name;
    public $age;
    public $gender;
    public $address;
    public $phone;
    public $email;

    public function __construct()
    {
        $this->tablename = "owner";
    }

    public function getTotalNumber()
    {
        try
        {
            $query = $this->connect()->prepare("SELECT COUNT(*) FROM $this->tablename");
            $query->execute();
            $result = $query->fetchColumn();
            if($query->rowCount() > 0)
            {
                return($result);
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
                return(0);
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
            $query = $this->connect()->prepare("SELECT * FROM $this->tablename WHERE o_id = $id");
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

    public function add()
    {
        try
        {
            $data = array(
                $this->name,
                $this->age,
                $this->gender,
                $this->address,
                $this->phone,
                $this->email
            );
            $query = $this->connect()->prepare("INSERT INTO $this->tablename (o_name, o_age, o_gender, o_address, o_phone, o_email) VALUES (?,?,?,?,?,?)");
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

    public function update($id)
    {
        try
        {
            $data = array(
                $this->name,
                $this->age,
                $this->gender,
                $this->address,
                $this->phone,
                $this->email
            );
            $query = $this->connect()->prepare("UPDATE $this->tablename SET o_name = ?, o_age = ?,o_gender = ?, o_address = ?, o_phone = ?, o_email = ? WHERE o_id = $id") ;
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

    public function delete($id)
    {
        try
        {
            $query = $this->connect()->prepare("DELETE FROM $this->tablename WHERE o_id = $id");
            $query->execute();
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

    public function deleteMultiple($ids)
    {
        try
        {
            $count = 0;
            $query = $this->connect()->prepare("DELETE FROM $this->tablename WHERE o_id = ?");
            foreach($ids as $id)
            {
                $query->execute(array($id));
                if($query->rowCount() > 0)
                {
                    $count++;
                }
            }
            if($count > 0)
            {
                return($count);
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

    public function __destruct()
    {
        
    }
} 
?>