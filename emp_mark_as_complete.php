<?php

include('connection.php');


if(isset($_SESSION['logged_in'])){
    
    $employee_id=$_SESSION['emp_id'] ;


}


if(isset($_GET['task_id'])){

    
    $stmt2 = $conn->prepare(" UPDATE employee SET emp_isFree=1 WHERE emp_id=?");
    $stmt2->bind_param("i",$employee_id);  
    $stmt2->execute();
  

    $task_id = $_GET['task_id'];
    
  
    $stmt = $conn->prepare("UPDATE task SET task_isComplete=1 WHERE task_id=?");
    $stmt->bind_param("i",$task_id);  
    
                if($stmt->execute()){
                   
    
    
                    
                  
                        header("location: emp_incomplete_assigned_task.php?success_message=Task was marked complete successfully");

                }
                else{
                        header("location: emp_incomplete_assigned_task.php?error_message=Error, Task was not not marked as complete");


                }
}
else{

    
    header("location: emp_incomplete_assigned_task.php?error_message=Error, no Task id was given");

}


?>
