<?php

include('connection.php');

session_start();

if(isset($_SESSION['logged_in'])){
    
    $employer_id=$_SESSION['emp_id'] ;


}



if(isset($_GET['task_id'])){

                        $task_id = $_GET['task_id'];
                    

                        $stmt7 = $conn->prepare("SELECT emp_id FROM employee WHERE emp_isAdmin=0 AND emp_isFree=1 limit 1");
                        
                    if($stmt7->execute()){
                        $stmt7->bind_result($emp_id);
                        $stmt7->store_result();
                        $stmt7->fetch();

                        if($stmt7->num_rows() == 1){
                                                        $stmt9 = $conn->prepare("UPDATE task SET task_isAssigned=1 WHERE task_id=$task_id");
                                                        $stmt9->execute();


                                                        $stmt10 = $conn->prepare("UPDATE employee SET emp_isFree=0 WHERE emp_id=$emp_id");
                                                        $stmt10->execute();



                                                        
                                                        $stmt8 = $conn->prepare("INSERT INTO ordered_task (ordered_task_id,ordered_employer_id,ordered_employee_id) VALUES (?,?,?)");

                                                        $stmt8->bind_param("iii",$task_id,$employer_id,$emp_id);   

                                                                 
                                                                    if($stmt8->execute()){
                                                                            header("location: unassigned_task.php?success_message=Task was Assigned successfully");

                                                                    }
                                                                    else{
                                                                            header("location: unassigned_task.php?error_message=Error, Task was not Assigned");


                                                                    }
                                                    }
                                                    else{
                                                        header("location: unassigned_task.php?error_message=Error, Employees are busy");
                                                    }
                                                
                                                }else{
                                                    header("location: unassigned_task.php?error_message=Error, try again");
                                                }
}
else{
    header("location: unassigned_task.php?error_message=Error, task id was not given");
}

?>
