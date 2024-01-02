<?php
session_start();
include("repository/config/Database.php");
include("repository/User.php");
if(isset($_POST['login']))
{
    try
    {
        $u = new User();
        $u->email = $_POST["email"];
        $u->password = $_POST["password"];
        $result = $u->validate();
        if($result == false)
        {
            $_SESSION["notfication"][] = array(
                "status" => "danger",
                "text" => "Email or Password Not Matched"
            );
            header("Location:login.php");
        }
        else
        {
            $_SESSION["user"] = $result;
            header("Location:admin/dashboard");
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