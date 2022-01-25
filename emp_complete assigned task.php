
<?php include('header.php'); ?>

<!--Interface-->
<section id="interface">
<?php include('navigation.php'); ?>

    <!--Title-->
    <h3 class="i-name">Complete Tasks</h3>

    <?php include('messages.php'); ?>
    <?php
include('emp_get_assigned_complete_task.php'); ?>

   

<!--Table-->
<div class="board">
<table width="100%">
    <thead>
        <tr> 
            <td>
            Task Id
            </td>
            <td>
            Task Description
            </td>
            <td>Order date</td>
            <td></td>
            
        </tr>
    </thead>
<tbody>

<?php foreach($assigned_complete_tasks as $assigned_complete_task){ ?>

    <tr>

    <td class="active">
            <p><?php echo $assigned_complete_task['task_id']; ?></p>
        </td>
                
        <td class="role">
        <p><?php echo $assigned_complete_task['task_description']; ?></p>

        </td>
        <td class="role">
                    <p><?php echo $assigned_complete_task['ordered_date']; ?></p>
                    
                    </td>
        

        <td class="active">
            <p>Completed</p>
        </td>
                

        
        
        
    </tr>


   <?php } ?>

   
</tbody>



</table>

</div>

<nav class="container mx-3"aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item <?php if($page_no <= 1){echo 'disabled';}?>">
    <a class="page-link" href="<?php if($page_no<=1){echo '#';}else{echo '?page_no='.($page_no-1);}?>">Previous</a></li>
  
<li class="page-item">
    <a class="page-link" href="?page_no=1">1</a>


</li>

<li class="page-item">
    <a class="page-link" href="?page_no=2">2</a>


</li>
<?php if($page_no >= 3){ ?>
<li class="page-item">
    <a class="page-link" href="#">...</a>


</li>

<li class="page-item">
    <a class="page-link" href="<?php echo "?page_no=".$page_no;?>"><?php echo $page_no;?></a>


</li>

<?php } ?>

<li class="page-item <?php if($page_no >= $total_no_of_pages){echo 'disabled';}?>">
<a class="page-link" href="<?php if($page_no >= $total_no_of_pages){echo '#';}else{echo '?page_no='.($page_no+1);}?>">Next</a></li>
  
</ul>
</nav>



</section>


<script>
$('#menu-btn').click(function(){
$('#menu').toggleClass('active')

})

</script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
</html>