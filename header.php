<?php

session_start();
//check if admin is not  logged in
if(!isset($_SESSION['logged_in'])){
    header("location: login.php");
    exit;



}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/css/style.css"/>
</head>
<body>

<?php if( $_SESSION['emp_isAdmin'] == 1){ ?>
    <!--Sidemenu-->
<section id="menu">
    <div class="logo">
        <img src="assets\imgs\logo.png"/>
        <h2>Dashboard</h2>


    </div>
<div class="items">
<li><i class="fas fa-chart-pie"></i><a href="index.php">Dashboard</a></li>
<li><i class="fab fa-uikit"></i><a href="unassigned_task.php">Unassigned tasks</a></li>
<li><i class="fas fa-th-large"></i><a href="add_task.php">Add task</a></li>
<li><i class="fas fa-edit"></i><a href="incomplete_assigned_task.php">Incomplete Assigned Tasks</a></li>
<li><i class="fab fa-cc-visa"></i><a href="complete_assigned task.php">Completed tasks</a></li>

</div>

</section>

<?php }else{ ?> 

    <!--Sidemenu-->
<section id="menu">
    <div class="logo">
        <img src="assets\imgs\logo.png"/>
        <h2>Dashboard</h2>


    </div>
<div class="items">
<li><i class="fas fa-chart-pie"></i><a href="index.php">Dashboard</a></li>
<li><i class="fab fa-uikit"></i><a href="emp_complete assigned task.php">Completed Tasks</a></li>
<li><i class="fas fa-chart-pie"></i><a href="emp_incomplete_assigned_task.php">Incomplete Assigned Tasks</a></li>

</div>

</section>







    <?php } ?> 