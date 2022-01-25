<?php

include('connection.php');



if(isset($_SESSION['logged_in'])){
    
    $employer_id=$_SESSION['emp_id'] ;


}



if(isset($_GET['page_no']) && $_GET['page_no'] != ""){

$page_no = $_GET['page_no'];
}
else{
    $page_no = 1;

}

//return the no of assigned_tasks

$stmt1=$conn->prepare("SELECT count(*) AS total_assigned_complete_task FROM task WHERE task_isAssigned=1 AND task_isComplete=1 AND task_id IN (SELECT ordered_task_id FROM ordered_task WHERE ordered_employer_id=$employer_id)");  

$stmt1->execute();

$stmt1->bind_result($total_assigned_complete_task);

$stmt1->store_result();

$stmt1->fetch();


//how many assigned_tasks per page
$total_assigned_complete_task_per_page = 4;

$offset = ( $page_no - 1 ) * $total_assigned_complete_task_per_page;

$total_no_of_pages = ceil( $total_assigned_complete_task / $total_assigned_complete_task_per_page);



// get unassigned_tasks
$stmt2 = $conn->prepare("SELECT t.task_id AS task_id, t.task_description AS task_description , o.ordered_employee_id AS emp_id  FROM task AS t INNER JOIN ordered_task AS o ON t.task_id=o.ordered_task_id WHERE t.task_isAssigned=1 AND t.task_isComplete=1 AND o.ordered_employer_id=$employer_id limit $offset,$total_assigned_complete_task_per_page");

$stmt2->execute();

$assigned_complete_tasks = $stmt2->get_result();

?>