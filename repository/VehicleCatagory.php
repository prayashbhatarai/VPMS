<?php
class VehicleCatagory extends Database
{
    private $tablename;
    public $id;
    public $title;
    public $description;
    public $rate;

    public function __construct()
    {
        $this->tablename = "vehiclecatagory";
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
            $query = $this->connect()->prepare("SELECT * FROM $this->tablename WHERE vc_id = $id");
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
            $data = array($this->title,$this->description,$this->rate);
            $query = $this->connect()->prepare("INSERT INTO $this->tablename (vc_title, vc_description, vc_rate) VALUES (?,?,?)");
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
            $data = array($this->title,$this->description,$this->rate);
            $query = $this->connect()->prepare("UPDATE $this->tablename SET vc_title = ?, vc_description = ?, vc_rate = ? WHERE vc_id = $id") ;
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
            $query = $this->connect()->prepare("DELETE FROM $this->tablename WHERE vc_id = $id");
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
            $query = $this->connect()->prepare("DELETE FROM $this->tablename WHERE vc_id = ?");
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