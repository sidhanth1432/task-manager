<?php

session_start();

if(isset($_SESSION['logged_in'])){
    header("location: index.php");
    exit;



}


include('connection.php');

if(isset($_POST['login_btn'])){

                        $email = $_POST['email'];
                        $password = md5($_POST['password']);

                        $stmt2 = $conn->prepare("SELECT emp_id,emp_isAdmin FROM employee WHERE emp_email=? and emp_password=? limit 1");
                        $stmt2->bind_param("ss",$email,$password);

                    if($stmt2->execute()){
                                            $stmt2->bind_result($emp_id,$emp_isAdmin);
                                            $stmt2->store_result();

                                            if($stmt2->num_rows() == 1){
                                                                $stmt2->fetch();
                                                                //store admin info in session

                                                                $_SESSION['emp_id'] = $emp_id;
                                                                $_SESSION['emp_isAdmin'] = $emp_isAdmin;
                                                               
                                                                $_SESSION['logged_in'] = true;


                                                                //send admin to dashboard
                                                                header("location: index.php?success_message=Welcome Back");
                                                                

                                                                    }
                                            else{

                                                    header("location: login.php?error_message=Wrong email/password, try again");
                                                    

                                                }

                    } else{

                        header("location: login.php?error_message=Error try again");
                       

                    }
                    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/css/style.css"/>
</head>
<body>
    
    <div class="container-fluid w-50 mt-5 mb-5">
<!--logo-->
<div class="my-5 text-center"> 
    <img src="assets\imgs\logo.png" />
    <h3 class="mt-2">Task Management</h3>
</div>

<?php include('messages.php'); ?>
<form method="POST" action="login.php">
<div class="mb-2 form-group">
<label>Email</label>
<input type="email" class="form-control" placeholder="email" name="email" id="email" />
</div>


<div class="mb-2 form-group">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="password" name="password" id="password" />
    </div>
    
<div class="mb-2 text-center">

    <input type="submit" class="btn btn-primary mt-3" value="Login" name="login_btn" id="login_btn" /> 

</div>

   </form>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
</html>