<?php // Need to do a write documentation for this project 

    /* 
    
        * This page verifies the User's Log in , successful log in will create a session to all the subscribed pages */
        
    include 'config.php'; // importing config page, to use its properties

    $connect = OpenConnection(); // calling the function to connect to the database and storing its return value

    if(isset($_REQUEST["Register"])){

        $name = $_POST['Unam'];
        $Lname = $_POST['Lanam'];
        $email = $_POST['E'];
        $phone = $_POST['T'];
        $address = $_POST['Address'];
        $pass = $_POST['p'];

        $query1 = "SELECT * FROM Customers"; // Return all records

        $result = mysqli_query($connect, $query1) or die("Unable to connect to database!"); // Execute query then return the result

        $Allrecords = mysqli_num_rows($result); // is used to return the number of rows returned from the data base based on the query


        

        if ($Allrecords == 0) {

            $Option1Query = "INSERT INTO Customers (Customer_email, First_Name, Last_Name, Password, Address, phone)
                        VALUES ('$email','$name','$Lname','$pass','$address','$phone')";

            $Option1Results =  mysqli_query($connect, $Option1Query) or die("Unable to connect to databasew!"); // Execute query then return the result

            echo "Successfully inserted data";

        } else { // Now to make sure to let the customer know if their credentials are already in the database 


        $carry = ""; // Will hold the duplicate value 

            while ($record = mysqli_fetch_array($result)) { // Then take results obtained from the initial query 

                    if ($email == $record['Customer_email']) {

                        $carry = "Email already contained in database, please try again";
                        break;
            
                    }else if ( $pass == $record['Password']){

                        $carry = "Please insert a different Password";
                        break;

                    }
                

            }

            echo $carry;


        }

    }
    else{

        echo "Try again!";

    }




?>