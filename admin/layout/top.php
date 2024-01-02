<?php
include("../../repository/config/Database.php");
include("../../repository/Owner.php");
include("../../repository/Parklog.php");
include("../../repository/Slot.php");
include("../../repository/User.php");
include("../../repository/Vehicle.php");
include("../../repository/VehicleCatagory.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-----------------------------------[Favicon]----------------------------------------->
    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/favicon/favicon-32x32.png">
    <link rel="manifest" href="../assets/favicon/site.webmanifest">
    <!------------------------------------------------------------------------------------->

    <!------------------------------[Bootstrap CSS]--------------------------------->
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.css">
    <!-----------------------------[Fontawesome CSS]-------------------------------->
    <link rel="stylesheet" href="../../assets/fontawesome-pro/css/all.css">
    <!------------------------------[Datatable CSS]--------------------------------->
    <link rel="stylesheet" href="../../assets/DataTables/datatables.css">
    <!------------------------------[Apexchart CSS]--------------------------------->
    <link rel="stylesheet" href="../../assets/apexchart/dist/apexcharts.css">
    <!-------------------------------[toastr CSS]----------------------------------->
    <link rel="stylesheet" href="../../assets/toastr/toastr.min.css">
    <!-------------------------------[Custom CSS]----------------------------------->
    <link rel="stylesheet" href="../../assets/custom/css/dashboard.css">
    <link rel="stylesheet" href="../../assets/custom/css/site.css">

    <!-- <script>
    if ( window.history.replaceState ) 
    {
        window.history.replaceState( null, null, window.location.href );
    }
    </script> -->
    <title>VPMS - <?php echo $title; ?></title>
</head>

<?php
if($title == "Dashboard")
{
    ?>
<body id="home-bg-color">
    <?php
}
else
{
    ?>
<body id="page-bg-color">
    <?php
}
?>
    <!-----------------------------[Jquery]-------------------------------->
    <script src="../../assets/jquery/jquery-3.6.0.js"></script>
    
    <!----------------------------[toastr JS]------------------------------>
    <script src="../../assets/toastr/toastr.min.js"></script>
    <script src="../../assets/toastr/toastr.config.js"></script>
    <?php include("top/topnavbar.php"); ?>
    <?php include("top/sidenavbar.php"); ?>
    <!---------------------------------------------[Main Section Start]---------------------------------------------->
    <main class="mt-5 pt-4">
        <div class="container-fluid">
            <!---------------------------------------------[Main Content Start]---------------------------------------------->