<?php
	// this file call and run the suitable logical instruction for our requests 
    require('views.php');
     
    if(isset($_GET['process'])){
        $_GET['process']();
    }
    else{
        header('location: /index.html');
    }

?>