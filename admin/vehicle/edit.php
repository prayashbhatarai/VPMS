<?php
session_start();
include("../layout/checkuser.php");
include("../../repository/config/Database.php");
include("../../repository/vehicle.php");
if(isset($_POST['edit']))
{
    try
    {
        //------------------[Validation]-----------------
        $error=0;
        if(empty($_POST["vc_id"]))
        {
            $_SESSION["notfication"][] = array(
                 "status" => "warning",
                 "text" => "No Catagory Selected" 
             );
             $error++;
        }
        if(empty($_POST["o_id"]))
        {
            $_SESSION["notfication"][] = array(
                "status" => "warning",
                "text" => "No Owner Selected" 
            );
            $error++; 
        }
        if(empty($_POST["name"]))
        {
            $_SESSION["notfication"][] = array(
                "status" => "warning",
                "text" => "Name is Empty" 
            );
            $error++; 
        }
        if(empty($_POST["number"]))
        {
            $_SESSION["notfication"][] = array(
                "status" => "warning",
                "text" => "Empty Vehicle Number" 
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
        $id = $_POST["id"];
        $v = new Vehicle();
        $v->vc_id = $_POST["vc_id"];
        $v->o_id = $_POST["o_id"];
        $v->name = $_POST["name"];
        $v->number = $_POST["number"];
        $v->model = $_POST["model"];
        $result = $v->update($id);
        if($result == true)
        {
            $_SESSION["notfication"][] = array(
                "status" => "success",
                "text" => "Updated Successfully" 
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