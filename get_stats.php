<?php

include('connection.php');


$id=$_SESSION['emp_id'];
if( $_SESSION['emp_isAdmin'] == 1){ 


    $stmt3=$conn->prepare("SELECT count(*) AS num_tasks FROM task WHERE task_isAssigned=0;");  

$stmt3->execute();

$stmt3->bind_result($num_tasks);

$stmt3->store_result();

$stmt3->fetch();



$stmt4=$conn->prepare("SELECT count(*) AS num_incomplete_order FROM task WHERE task_isAssigned=1 AND task_isComplete=0 AND task_id IN (SELECT ordered_task_id FROM ordered_task WHERE ordered_employer_id=$id)");  
  

$stmt4->execute();

$stmt4->bind_result($num_incomplete_order);

$stmt4->store_result();

$stmt4->fetch();


$stmt5=$conn->prepare("SELECT count(*) AS num_complete_order FROM task WHERE task_isAssigned=1 AND task_isComplete=1 AND task_id IN (SELECT ordered_task_id FROM ordered_task WHERE ordered_employer_id=$id)");  


$stmt5->execute();

$stmt5->bind_result($num_complete_order);

$stmt5->store_result();

$stmt5->fetch();



$stmt6=$conn->prepare("SELECT count(*) AS num_of_free_employee FROM employee WHERE emp_isAdmin=0 AND emp_isFree=1");  

$stmt6->execute();

$stmt6->bind_result($num_of_free_employee);

$stmt6->store_result();

$stmt6->fetch();




}else{

$stmt1=$conn->prepare("SELECT count(*) AS num_incomplete_order FROM task AS t INNER JOIN ordered_task AS o ON t.task_id=o.ordered_task_id WHERE t.task_isAssigned=1 AND t.task_isComplete=0 AND o.ordered_employee_id=$id; ");  



$stmt1->execute();

$stmt1->bind_result($num_incomplete_order);

$stmt1->store_result();

$stmt1->fetch();


$stmt2=$conn->prepare("SELECT count(*) AS num_complete_order FROM task WHERE task_isAssigned=1 AND task_isComplete=1 AND task_id IN (SELECT ordered_task_id FROM ordered_task WHERE ordered_employee_id=$id)");  

$stmt2->execute();

$stmt2->bind_result($num_complete_order);

$stmt2->store_result();

$stmt2->fetch();







}





?>