<?php include('header.php'); ?>

<!--Interface-->
<section id="interface">
   <?php include('navigation.php'); ?>

    <!--Title-->
    <h3 class="i-name">Dashboard</h3>
    <?php include('messages.php'); ?>


    <?php include('get_stats.php'); ?>


    <?php if( $_SESSION['emp_isAdmin'] == 1){ ?>



         <!--Cards-->
    <div class="values">
        <div class="val-box">
            <i class="fas fa-users"></i>
       <div>
           <h3><?php if($num_tasks != null){echo $num_tasks;}else{echo 0;} ?></h3>
           <span>Tasks</span>
       </div>
        </div>


        <div class="val-box">
            <i class="fas fa-users"></i>
       <div>
           <h3><?php if($num_incomplete_order != null){echo $num_incomplete_order;}else{echo 0;} ?></h3>
           <span>Incomplete Orders</span>
       </div>
        </div>


        <div class="val-box">
            <i class="fas fa-users"></i>
       <div>
           <h3><?php if($num_complete_order != null){echo $num_complete_order;}else{echo 0;} ?></h3>
           <span>Complete Orders</span>
       </div>
        </div>


        <div class="val-box">
            <i class="fas fa-users"></i>
       <div>
           <h3><?php if($num_of_free_employee != null){echo $num_of_free_employee;}else{echo 0;} ?></h3>
           <span>Free Employees</span>
       </div>
        </div>


   
   
   
   
    </div>


        <?php }else{ ?> 



              <!--Cards-->
    <div class="values">
        <div class="val-box">
            <i class="fas fa-users"></i>
       <div>
           <h3><?php if($num_incomplete_order != null){echo $num_incomplete_order;}else{echo 0;} ?></h3>
           <span>Incomplete Orders</span>
       </div>
        </div>


        <div class="val-box">
            <i class="fas fa-users"></i>
       <div>
           <h3><?php if($num_complete_order != null){echo $num_complete_order;}else{echo 0;} ?></h3>
           <span>Complete Orders</span>
       </div>
        </div>
        </div>

            <?php } ?> 

   

  




</section>


<script>
$('#menu-btn').click(function(){
$('#menu').toggleClass('active')

})

</script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
</html>