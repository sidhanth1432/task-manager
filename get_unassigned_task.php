<?php

include('connection.php');


if(isset($_GET['page_no']) && $_GET['page_no'] != ""){

$page_no = $_GET['page_no'];
}
else{
    $page_no = 1;

}

//return the no of unassigned_tasks

$stmt1=$conn->prepare("SELECT count(*) AS total_unassigned_tasks FROM task WHERE task_isAssigned=0");  

$stmt1->execute();

$stmt1->bind_result($total_unassigned_tasks);

$stmt1->store_result();

$stmt1->fetch();


//how many unassigned_tasks per page
$total_unassigned_tasks_per_page = 4;

$offset = ( $page_no - 1 ) * $total_unassigned_tasks_per_page;

$total_no_of_pages = ceil( $total_unassigned_tasks / $total_unassigned_tasks_per_page);



// get unassigned_tasks
$stmt2 = $conn->prepare("SELECT task_id,task_description FROM task WHERE task_isAssigned=0 limit $offset,$total_unassigned_tasks_per_page");

$stmt2->execute();

$unassigned_tasks = $stmt2->get_result();

?>