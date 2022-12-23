<?php 

    /* 
    
        * This page verifies the User's Log in , successful log in will create a session to all the subscribed pages */
        
        include 'config.php'; // importing config page, to use its properties

        $connect = OpenConnection(); // calling the function to connect to the database and storing its return value
    
        if(isset($_REQUEST["Register"])){

            $name = $_POST['Unam'];
            
            echo $name;

        }
        else{

    echo "Try again!";
        }

    


?>