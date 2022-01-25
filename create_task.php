<?php

include('connection.php');


if( isset($_POST['add_task_btn'])){
                $description = $_POST['task_description'];

                if($description == ''){
                    header("location: add_task.php?error_message=Error, Task Description is required");
                    exit;
                }
                



                $stmt = $conn->prepare("INSERT INTO task (task_description,task_isAssigned,task_isComplete) VALUES (?,0,0)");

                $stmt->bind_param("s",$description);        

                if($stmt->execute()){
                        header("location: unassigned_task.php?success_message=Task was created successfully");

                }
                else{
                        header("location: unassigned_task.php?error_message=Error, Task was not created");


                }

}
else{
    header("location: unassigned_task.php?error_message=Error try again");
 

}
?>