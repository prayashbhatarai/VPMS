<?php
class Slot extends Database
{
    private $tablename;
    public $id;
    public $title;
    public $status;

    public function __construct()
    {
        $this->tablename = "slot";
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
    public function getTotalParked()
    {
        try
        {
            $query = $this->connect()->prepare("SELECT COUNT(*) FROM $this->tablename WHERE s_status='P'");
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

    public function getTotalAvailable()
    {
        try
        {
            $query = $this->connect()->prepare("SELECT COUNT(*) FROM $this->tablename WHERE s_status='A'");
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
            $query = $this->connect()->prepare("SELECT * FROM $this->tablename WHERE s_id = $id");
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
            $data = array($this->title,"A");
            $query = $this->connect()->prepare("INSERT INTO $this->tablename (s_title, s_status) VALUES (?,?)");
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
            $data = array($this->title);
            $query = $this->connect()->prepare("UPDATE $this->tablename SET s_title = ? WHERE s_id = $id") ;
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

    public function park($id)
    {
        try
        {
            $data = array("P");
            $query = $this->connect()->prepare("UPDATE $this->tablename SET s_status = ? WHERE s_id = $id");
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

    public function available($id)
    {
        try
        {
            $data = array("A");
            $query = $this->connect()->prepare("UPDATE $this->tablename SET s_status = ? WHERE s_id = $id");
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
            $query = $this->connect()->prepare("DELETE FROM $this->tablename WHERE s_id = $id");
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
            $query = $this->connect()->prepare("DELETE FROM $this->tablename WHERE s_id = ?");
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

    public function validate()
    {
        if($this->title=="")
        {
            return(false);
        }
        else
        {
            return(true);
        }
    }

    public function __destruct()
    {
        
    }
} 
?>