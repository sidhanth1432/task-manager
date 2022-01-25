<?php

include('connection.php');


if(isset($_GET['task_id'])){

    $task_id = $_GET['task_id'];
    
    
    $stmt = $conn->prepare("DELETE FROM task WHERE task_id=? LIMIT 1");

                $stmt->bind_param("i",$task_id);        

                if($stmt->execute()){
                        header("location: unassigned_task.php?success_message=Task was Deleted successfully");

                }
                else{
                        header("location: unassigned_task.php?error_message=Error, Task was not Deleted");


                }
}
else{

    
    header("location: unassigned_task.php?error_message=Error, no Task id was given");

}


?>
