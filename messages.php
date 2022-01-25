<?php

if(isset($_GET['success_message'])){

    echo "<p class='text-center' style='color:green'>".$_GET['success_message']."</p>";
}


if(isset($_GET['error_message'])){

    echo "<p class='text-center' style='color:red'>".$_GET['error_message']."</p>";
} 

?>