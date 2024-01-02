<?php
class Vehicle extends Database
{
    private $tablename;
    public $vc_id;
    public $o_id;
    public $name;
    public $number;
    public $model;
    public $status;

    public function __construct()
    {
        $this->tablename = "vehicle";
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
            $query = $this->connect()->prepare("SELECT COUNT(*) FROM $this->tablename WHERE v_status='P'");
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

    public function getTotalUnparked()
    {
        try
        {
            $query = $this->connect()->prepare("SELECT COUNT(*) FROM $this->tablename WHERE v_status='A' OR v_status='U'");
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
            $query = $this->connect()->prepare("SELECT * FROM $this->tablename WHERE v_id = $id");
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

    public function getParkedVehicle()
    {
        try
        {
            $query = $this->connect()->prepare("SELECT * FROM $this->tablename WHERE v_status = 'P'");
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

    public function getUnparkedVehicle()
    {
        try
        {
            $query = $this->connect()->prepare("SELECT * FROM $this->tablename WHERE v_status = 'U' OR v_status = 'A'");
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

    public function add()
    {
        try
        {
            $data = array(
                $this->vc_id,
                $this->o_id,
                $this->name,
                $this->number,
                $this->model,
                "A"
            );
            $query = $this->connect()->prepare("INSERT INTO $this->tablename (vc_id, o_id, v_name, v_number, v_model, v_status) VALUES (?,?,?,?,?,?)");
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
                $this->vc_id,
                $this->o_id,
                $this->name,
                $this->number,
                $this->model
            );
            $query = $this->connect()->prepare("UPDATE $this->tablename SET vc_id = ?, o_id = ?, v_name = ?, v_number = ?, v_model = ? WHERE v_id = $id") ;
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
            $query = $this->connect()->prepare("UPDATE $this->tablename SET v_status = ? WHERE v_id = $id");
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
    public function unpark($id)
    {
        try
        {
            $data = array("U");
            $query = $this->connect()->prepare("UPDATE $this->tablename SET v_status = ? WHERE v_id = $id");
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
            $query = $this->connect()->prepare("DELETE FROM $this->tablename WHERE v_id = $id");
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
            $query = $this->connect()->prepare("DELETE FROM $this->tablename WHERE v_id = ?");
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

    public function hasOwner($id)
    {
        try
        {
            $query = $this->connect()->prepare("SELECT * FROM $this->tablename WHERE o_id = $id");
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
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
    public function hasCatagory($id)
    {
        try
        {
            $query = $this->connect()->prepare("SELECT * FROM $this->tablename WHERE vc_id = $id");
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
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
    public function __destruct()
    {
        
    }
} 
?>