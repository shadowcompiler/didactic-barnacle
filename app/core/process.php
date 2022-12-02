<?php
	// this file call and run the suitable logical instruction for our requests 
    require('views.php');
     
    if(isset($_GET['p'])){
        $_GET['p']();
    }
    else{
        header('location: /index.html');
    }

?>