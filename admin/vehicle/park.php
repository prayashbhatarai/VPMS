<?php
session_start();
include("../layout/checkuser.php");
include("../../repository/config/Database.php");
include("../../repository/Vehicle.php");
include("../../repository/Slot.php");
include("../../repository/Parklog.php");
if(isset($_POST['park']))
{
    try
    {
        $vid=$_POST['v_id'];
        $sid=$_POST['s_id'];
        $pl = new Parklog();
        $pl->v_id = $vid;
        $pl->s_id = $sid;
        $pl->checkin_date=$pl->todayDate();
        $pl->checkin_time=$pl->todayTime();
        $result = $pl->park();
        if($result == true)
        {
            $v = new Vehicle();
            $v->park($vid);
            $s = new Slot();
            $s->park($sid);
            $_SESSION["notfication"][] = array(
                "status" => "success",
                "text" => "Parked Successfully" 
            );
            header("Location:parkedvehicle.php");
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