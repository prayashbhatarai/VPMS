<?php
session_start();
include("../layout/checkuser.php");
include("../../repository/config/Database.php");
include("../../repository/VehicleCatagory.php");
if(isset($_POST['add']))
{
    try
    {
        //------------------[Validation]-----------------
        $error=0;
        if(empty($_POST["title"]))
        {
            $_SESSION["notfication"][] = array(
                "status" => "warning",
                "text" => "Title is Empty" 
            );
            $error++;
        }
        if(empty($_POST["rate"]))
        {
            $_SESSION["notfication"][] = array(
                "status" => "warning",
                "text" => "Rate is Empty" 
            );
            $error++; 
        }
        if($error > 0)
        {
            $_SESSION["notfication"][] = array(
                "status" => "error",
                "text" => "Operation Failed" 
            );
            header("Location:index.php");
            die();
        }
        //----------------------------------------------
        $vc = new VehicleCatagory();
        $vc->title = $_POST["title"];
        $vc->description = $_POST["description"];
        $vc->rate = $_POST["rate"];
        $result = $vc->add();
        if($result == true)
        {
            $_SESSION["notfication"][] = array(
                "status" => "success",
                "text" => "Saved Successfully" 
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
