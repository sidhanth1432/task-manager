<?php

include('connection.php');
if(isset($_POST['update_task_btn'])){

$task_id = $_POST['task_id'];

$description = $_POST['task_description'];


$stmt = $conn->prepare("UPDATE task SET task_description=? WHERE task_id=?");

                $stmt->bind_param("si",$description,$task_id);        

                if($stmt->execute()){
                        header("location: unassigned_task.php?success_message=Task was updated successfully");

                }
                else{
                        header("location: unassigned_task.php?error_message=Error, Task was not updated");


                }
            }else{

    
                header("location: unassigned_task.php?error_message=Error, no Task id was given");
            
            }
            
  ?>