<?php
    /* A function to a open a connecttion to a database */

    function OpenConnection(){ // Function to Open a connection, when called will will other return connection or error
 
        $dbhost = "bqb6bmikgqu0mnc0iiyq-mysql.services.clever-cloud.com";
        $dbuser = "uwge0zlmihcmhulr";
        $dbpass = "2WVoKwXz4jFu57oNdrZn";
        $db = "bqb6bmikgqu0mnc0iiyq";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Failed to connect to database". $conn -> error); //Attempting to Connect to the database with the specified credentials or return the die message in the form of an error 

        
        return $conn;
    }
    
    /* // functoin to close connection , 
    * that takes in the connection that will be returned by the above function when called on an external file
    */
    function CloseConnection($conn) 
    {
        $conn -> close();
    }
    

    function clean_input ($data){ // Function to clean form data

        $data = trim($data); // Getting rif of white spaces 
        $data = stripslashes ($data); //  removes backslashes
        $data = htmlspecialchars ($data); // converts special characters to HTML entities to prevent attackers from taking advantage of he code
        return $data; // then the data is returned
    }


?>