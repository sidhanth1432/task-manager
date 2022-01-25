<?php

include('connection.php');
if(isset($_POST['update_incomplete_task_btn'])){

$task_id = $_POST['task_id'];

$emp_id = $_POST['emp_id'];

$stmt1 = $conn->prepare("SELECT ordered_employee_id FROM ordered_task WHERE ordered_task_id=$task_id limit 1");
if($stmt1->execute()){
$stmt1->bind_result($emp1_id);
$stmt1->store_result();
$stmt1->fetch();
}



$stmt11 = $conn->prepare("SELECT emp_isFree FROM employee WHERE emp_isAdmin=0 AND emp_id=$emp_id limit 1");

if($stmt11->execute()){
    $stmt11->bind_result($emp_isFree);
    $stmt11->store_result();
    $stmt11->fetch();

    if($emp_isFree == 1){


        $stmt15 = $conn->prepare("UPDATE employee SET emp_isFree=1 WHERE emp_id=$emp1_id");
                                                        $stmt15->execute();

        $stmt13 = $conn->prepare("UPDATE employee SET emp_isFree=0 WHERE emp_id=$emp_id");
                                                        $stmt13->execute();
        $stmt12 = $conn->prepare("UPDATE ordered_task SET ordered_employee_id=$emp_id WHERE ordered_task_id=$task_id ");
        
        $stmt12->execute();
        header("location: incomplete_assigned_task.php?success_message=Reassigned Task successfully");
  
    }
    else{
        header("location: incomplete_assigned_task.php?error_message=Error ,Employee is busy");

    }
}else{

    header("location: incomplete_assigned_task.php?error_message=Error ,try again");
}
}
