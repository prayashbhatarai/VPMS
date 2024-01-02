<?php
session_start();
include("../layout/checkuser.php");
include("../../repository/config/Database.php");
include("../../repository/Vehicle.php");
include("../../repository/Slot.php");
include("../../repository/Parklog.php");
if(isset($_GET['id']))
{
    try
    {
        $vid=$_GET['id'];
        $pl = new Parklog();
        $lastdata = $pl->getVehicleLastLogById($vid);
        $pl->checkout_date=$pl->todayDate();
        $pl->checkout_time=$pl->todayTime();
        $result = $pl->unpark($vid);
        print_r($lastdata);
        if($result == true && $lastdata != false)
        {
            $v = new Vehicle();
            $v->unpark($vid);
            $s = new Slot();
            $s->available($lastdata->s_id);
            $_SESSION["notfication"][] = array(
                "status" => "success",
                "text" => "Unparked Successfully" 
            );
            header("Location:unparkedvehicle.php");
        }
        else
        {
            $_SESSION["notfication"][] = array(
                "status" => "error",
                "text" => "Operation Failed" 
            );
           header("Location:index.php");
        }
    }
    catch(Exception $e)
    {
        $message = $e->getMessage();
        $_SESSION["notfication"][] = array(
            "status" => "warning",
            "text" => $message
        );
        header("Location:index.php");
    }
}
else
{
    header("Location:index.php");
}
?>