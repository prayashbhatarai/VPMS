<?php
session_start();
include("../layout/checkuser.php");
include("../../repository/config/Database.php");
include("../../repository/VehicleCatagory.php");
if(isset($_GET['id']))
{
    try
    {
        $id=$_GET['id'];
        $vc = new VehicleCatagory();
        $result = $vc->delete($id);
        if($result == true)
        {
            $_SESSION["notfication"][] = array(
                "status" => "success",
                "text" => "Deleted Successfully" 
            );
            header("Location:index.php");
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