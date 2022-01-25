/*REFER 10 FOLDER ACCOUNT VIDEO FOR SESSION INFO TO SEPARATE EMPLOYEE AND EMPLOYER*/

CREATE TABLE IF NOT EXISTS `task` (
    `task_id` int( 11 ) NOT NULL AUTO_INCREMENT,
    `task_description` varchar(255) NOT NULL,
    `task_isAssigned` int( 1 ) NOT NULL,
    `task_isComplete` int( 1 ) NOT NULL,
    PRIMARY KEY (`task_id`)

)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `ordered_task` (
    `ordered_task_id` int( 11 ) NOT NULL AUTO_INCREMENT,
    `ordered_employer_id` int( 11 ) NOT NULL,
    `ordered_employee_id` int( 11 ) NOT NULL,
    `ordered_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    
    PRIMARY KEY (`order_task_id`),
     FOREIGN KEY(order_employee_id) 
        REFERENCES employee(emp_id)
        ON DELETE CASCADE

)ENGINE=InnoDB DEFAULT CHARSET=latin1;





CREATE TABLE IF NOT EXISTS `employee` (
    `emp_id` int( 11 ) NOT NULL AUTO_INCREMENT,
    `emp_name` varchar( 100 ) NOT NULL,
    `emp_email` varchar(100) NOT NULL,
    `emp_password` varchar( 255 ) NOT NULL,
    `emp_isAdmin` int( 1 ) NOT NULL,
    `emp_isFree` int( 1 ) NOT NULL,
    PRIMARY KEY (`emp_id`)
    )ENGINE=InnoDB DEFAULT CHARSET=latin1;


    /*employee*/
/*no of incomplete order*/

SELECT count(*) AS num_incomplete_order FROM (task NATURAL JOIN order AS(task_id,order_employer_id,order_employee_id,order_date)) 
WHERE task_isAssigned=1 AND task_isComplete=0 AND order_employee_id=ID STORED IN THE SESSION;

/*no of complete order*/

SELECT count(*) AS num_complete_order FROM task 
WHERE task_isAssigned=1 AND task_isComplete=1 AND task_id IN 
(SELECT order_task_id FROM order WHERE order_employee_id=ID STORED IN THE SESSION)


/*DISPLAY THE LIST OF ASSIGNED TASK WHICH ARE INCOMPLETE*/
/*task_id?task_description?order date?markAsComplete*/

SELECT task_id,task_description,order_date FROM (task NATURAL JOIN order AS(task_id,order_employer_id,order_employee_id,order_date)) 
WHERE task_isAssigned=1 AND task_isComplete=0 AND order_employee_id=ID STORED IN THE SESSION;

/*mark task as complete/update using task id*/
UPDATE task SET task_isComplete=1
WHERE task_id=(U GET TASK ID FROM THE GET PARAMETER)

UPDATE employee SET emp_isFree=1
WHERE emp_id=ID STORED IN THE SESSION;

/*DISPLAY THE LIST OF ASSIGNED TASK WHICH ARE COMPLETE*/
/*task_id?task_description?completed*/
SELECT task_id,task_description FROM task 
WHERE task_isAssigned=1 AND task_isComplete=1 AND task_id IN 
(SELECT order_task_id FROM order WHERE order_employee_id=ID STORED IN THE SESSION)


/*EMPLOYER*/
/*NO OF TASKS*/
SELECT count(*) AS num_tasks FROM task

/*no of INCOMPLETE ORDER*/
SELECT count(*) AS num_incomplete_order FROM task WHERE task_isAssigned=1 AND task_isComplete=0;

/*no of COMPLETE ORDER*/
SELECT count(*) AS num_complete_order FROM task WHERE task_isAssigned=1 AND task_isComplete=1;

/*no of FREE EMPLOYEE*/
SELECT count(*) AS num_of_free_employee FROM employee WHERE emp_isAdmin=0 AND emp_isFree=1;

/*CREATE TASK*/
/*FORM task_description*/
/*REQUIRED FIELDS*/
INSERT INTO task (task_description,task_isAssigned,task_isComplete)
VALUES (task_description,0,0)

/*CREATE USER*/
/*FORM EMPLOYEE NAME?EMPLOYEE EMAIL?EMPLOYEE PASSWORD?IS ADMIN?*/
/*REQUIRED FIELDS WITH UNIQUE EMAIL */
INSERT INTO employee (emp_name,emp_email,emp_password,emp_isAdmin,emp_isFree)
VALUES (,1)

/*DISPLAY THE LIST OF TASKS WHICH ARENT ASSIGNED*/
/*task_id?task_description?ASSIGN TASK?update?delete*/

SELECT task_id,task_description FROM task WHERE task_isAssigned=0;

/*Assign task that is create an order*/
/*put a check if there is atleast 1 free employee using*/
SELECT emp_id FROM employee WHERE emp_isAdmin=0 AND emp_isFree=1 limit 1;
 
 $stmt2 = $conn->prepare("SELECT emp_id FROM employee WHERE emp_isAdmin=0 AND emp_isFree=1 limit 1");
                        

                    if($stmt2->execute()){
                                            $stmt2->bind_result($emp_id);
                                            $stmt2->store_result();

                                            if($stmt2->num_rows() == 1){
                                                
                                                    /*write the sql to create an order cuz now u have both the task id and employee id fetched from the db*/

                                                                header("location: orders.php?success_message=order is placed");
                                                                

                                                                    }
                                            else{

                                                    header("location: notAssignedTasks.php?error_message=employees are busy");
                                                    

                                                }

                    } else{

                        header("location: notAssignedTasks.php?error_message=Error try again");
                       

                    }

/*create an order*/
INSERT INTO order (order_task_id,order_employer_id,order_employee_id)
VALUES ()
order_task_id from the get request
order_employer_id from the session id
order_employee_id from the returned value from the db

/*update the tasks which arent assigned*/
/*FORM? TASK DESCRIPTION? REQUIRED? TRY TO PUT IN THE EXISTING VALUES BY FETCHING IT FROM DB*/
UPDATE task SET task_description=
WHERE task_id=(U GET TASK ID FROM THE GET PARAMETER)

/*DELETE the tasks which arent assigned*/
DELETE FROM task 
WHERE id=? LIMIT 1

task_id is provided from the get request

/*DISPLAY THE LIST OF employers*/ 
/*emp_id?emp_name?emp_email*/
SELECT emp_id,emp_name,emp_email, FROM employee WHERE emp_isAdmin=1;
/*DISPLAY THE LIST OF Employees*/ 
/*emp_id?emp_name?emp_email?update?delete*/
SELECT emp_id,emp_name,emp_email FROM employee WHERE emp_isAdmin=0;

/*update the employee info*/
/*FORM emp_name,emp_email,emp_isAdmin*/
/*REQUIRED FIELDS WITH UNIQUE EMAIL */
UPDATE employee SET emp_name=,emp_email=,emp_isAdmin=
WHERE emp_id=(U GET emp ID FROM THE GET PARAMETER)

/*DELETE the Employee*/

DELETE FROM employee 
WHERE emp_id=? LIMIT 1

(U GET emp ID FROM THE GET PARAMETER)

for employee
/*on deleting employees,if the order is incomplete task_isComplete==0,then mark task as not assigned task_isAssigned=0*/
SELECT task_id FROM task 
WHERE task_isAssigned=1 AND task_isComplete=0 AND task_id IN 
(SELECT order_task_id FROM order WHERE order_employee_id=ID is in the get request) limit 1

 if($stmt2->num_rows() == 1){
                                                
    UPDATE task SET task_isAssigned=0,
    WHERE task_id =(U get it from the above sql query)}

DELETE FROM employee 
WHERE emp_id=? LIMIT 1

(U GET emp ID FROM THE GET PARAMETER)


/*display the LIST OF ASSIGNED TASK WHICH ARE INCOMPLETE*/
/*task_id?task_description?order date?update order*/

SELECT task_id,task_description,order_date FROM (task NATURAL JOIN order AS(task_id,order_employer_id,order_employee_id,order_date)) 
WHERE task_isAssigned=1 AND task_isComplete=0 AND order_employer_id=ID STORED IN THE SESSION;

/*TRICKY BEWARE.. CHECK IF THE EMPLOYEE IS FREE..ONLY THEN UPDATE ORDER OR RETURN ERROR*/
UPDATE order SET order_employee_id=(u get it from the get request)





/*DISPLAY THE LIST OF ASSIGNED TASK WHICH ARE COMPLETE*/
/*task_id?task_description?completed*/
SELECT task_id,task_description FROM task 
WHERE task_isAssigned=1 AND task_isComplete=1 AND task_id IN 
(SELECT order_task_id FROM order WHERE order_employer_id=ID STORED IN THE SESSION)


