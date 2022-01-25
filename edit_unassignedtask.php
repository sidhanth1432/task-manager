<?php include('header.php'); ?>

<!--Interface-->
<section id="interface">
<?php include('navigation.php'); ?>

    <!--Title-->
    <h3 class="i-name">Update Unassigned Task</h3>

<?php
if(!isset($_GET['task_id'])){
header('location: unassigned_task.php?error_message=task id was not given');
exit;

}

?>
     

<div class="container-fluid w-50 my-5">
    

<form method="POST" action="update_unassigned_task.php">
        <div class="mb-2 form-group">
        <label>Task Id</label>
    <p class="form-control"><?php echo $_GET['task_id']; ?></p>   
    <input type="hidden" name="task_id" value="<?php echo $_GET['task_id']; ?>"/>
    </div>


    <div class="mb-2 form-group">
                <label>Task Description
                </label>
                <input type="text" class="form-control" placeholder="task description" name="task_description" id="task_description" required />
                </div>
                 
        
        
                     
            
            
        <div class="mb-2 text-center">
        
            <input type="submit" class="btn btn-primary mt-3" value="Update task" name="update_task_btn" id="update_task_btn" /> 
        
        </div>
        
           </form>
        
        </div>



</section>


<script>
$('#menu-btn').click(function(){
$('#menu').toggleClass('active')

})

</script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
</html>