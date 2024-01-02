<?php
class Parklog extends Database
{
    private $tablename;
    public $v_id;
    public $s_id;
    public $checkin_date;
    public $checkin_time;
    public $checkout_date;
    public $checkout_time;
    public $status;

    public function __construct()
    {
        $this->tablename = "parklog";
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
            $query = $this->connect()->prepare("SELECT * FROM $this->tablename WHERE p_id = $id");
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

    public function getBetweenTwoDate($FromDate,$ToDate)
    {
        try
        {
            $data=array($FromDate,$ToDate);
            $query = $this->connect()->prepare("SELECT * FROM $this->tablename WHERE p_checkin_date >= ? AND p_checkout_date <= ?");
            $query->execute($data);
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

    public function getVehicleLastLogById($id)
    {
        try
        {
            $query = $this->connect()->prepare("SELECT * FROM $this->tablename WHERE v_id = $id AND p_status = 'P'");
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

    public function getVehicleAllLogById($id)
    {
        try
        {
            $query = $this->connect()->prepare("SELECT * FROM $this->tablename WHERE v_id = $id");
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

    public function park()
    {
        try
        {
            $data = array(
                $this->v_id,
                $this->s_id,
                $this->checkin_date,
                $this->checkin_time,
                "",
                "",
                "P"
            );
            $query = $this->connect()->prepare("INSERT INTO $this->tablename (v_id, s_id, p_checkin_date, p_checkin_time, p_checkout_date ,p_checkout_time, p_status) VALUES (?,?,?,?,?,?,?)");
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
            $data = array(
                $this->checkout_date,
                $this->checkout_time,
                "D"
            );
            $query = $this->connect()->prepare("UPDATE $this->tablename SET p_checkout_date = ?, p_checkout_time = ?, p_status = ? WHERE v_id = $id AND p_status='P'") ;
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

    public function todayDate()
    {
        date_default_timezone_set("Asia/Kathmandu");
        $date = date("Y-m-d");
        return($date); 
    }

    public function todayTime()
    {
        date_default_timezone_set("Asia/Kathmandu");
        $time = date("H:i:s", time());
        return($time); 
    }

    public function hasVehicle($id)
    {
        try
        {
            $query = $this->connect()->prepare("SELECT * FROM $this->tablename WHERE v_id = $id");
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

    public function hasSlot($id)
    {
        try
        {
            $query = $this->connect()->prepare("SELECT * FROM $this->tablename WHERE s_id = $id");
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