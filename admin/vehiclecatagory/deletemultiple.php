<?php
session_start();
include("../layout/checkuser.php");
include("../../repository/config/Database.php");
include("../../repository/VehicleCatagory.php");
if(isset($_POST['delete']))
{
    try
    {
        $ids = $_POST['ids'];
        $vc = new VehicleCatagory();
        $result = $vc->deleteMultiple($ids);
        if(isset($ids))
        {
            if($result != 0)
            {
                $message = $result." Item Deleted Successfully";
                $_SESSION["notfication"][] = array(
                    "status" => "success",
                    "text" => $message 
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
        else
        {
            $_SESSION["notfication"][] = array(
                "status" => "warning",
                "text" => "No Records Selected" 
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