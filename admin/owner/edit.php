<?php
session_start();
include("../layout/checkuser.php");
include("../../repository/config/Database.php");
include("../../repository/Owner.php");
if(isset($_POST['edit']))
{
    try
    {
        //------------------[Validation]-----------------
        $error=0;
        if(empty($_POST["name"]))
        {
            $_SESSION["notfication"][] = array(
                "status" => "warning",
                "text" => "Name is Empty" 
            );
            $error++;
        }
        if(empty($_POST["age"]))
        {
            $_SESSION["notfication"][] = array(
                "status" => "warning",
                "text" => "Age is Empty" 
            );
            $error++; 
        }
        if(empty($_POST["phone"]))
        {
            $_SESSION["notfication"][] = array(
                "status" => "warning",
                "text" => "Phone is Empty" 
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
        $o = new Owner();
        $o->name = $_POST["name"];
        $o->age = $_POST["age"];
        $o->gender = $_POST["gender"];
        $o->address = $_POST["address"];
        $o->phone = $_POST["phone"];
        $o->email = $_POST["email"];
        $result = $o->update($id);
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