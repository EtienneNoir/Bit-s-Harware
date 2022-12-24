<?php 

    /* 
    
        * This page verifies the User's Log in , successful log in will create a session to all the subscribed pages */
        
        include 'config.php'; // importing config page, to use its properties

        $connect = OpenConnection(); // calling the function to connect to the database and storing its return value
 
        if(isset($_REQUEST["Register"])){

            $name = $_POST['Unam'];
            $name = $_POST['Lanam'];
            $name = $_POST['E'];
            $name = $_POST['T'];
            $name = $_POST['Address'];
            $name = $_POST['p'];

            $query1 = "SELECT * FROM Customers"; 

            $result = mysqli_query($connect, $query1) or die("Unable to connect to database!"); // Execute query then return the result

            $Allrecords = mysqli_num_rows($result); // is used to return the number of rows returned from the data base based on the query

        if ($Allrecords == 0) {

            echo "Nothing to check current credentials with, this is indicating that this is the first customer";
        }

        }
        else{

    echo "Try again!";
        }

    


?>