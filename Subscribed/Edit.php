<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Index/Navigation/nav&Title.css">
    <link rel="stylesheet" href="../CSS/Index/TableMain.css">
    <link rel="stylesheet" href="../CSS/Index/Footer.css">
    <link rel="stylesheet" href="../CSS/Animation.css">
    <link rel="icon" type="png" href="../Images/favicon.png">
    <link rel="stylesheet" href="../CSS/Sign/Sign.css">
    <title>Bit's Hardwares</title>

</head>


<body style="background-image:url(../Images/Background.jpg) ; margin:auto; width: fit-content;">
    <h2 id="title"> <img src="../Images/favicon.png" alt="Image of CPU" id="animation"> <Strong> Bit's Hardwares </Strong> </h2>

    <header>

        <nav id="nav">
            <ul>
                <li>
                    <a href="index2.php" > Home </a> 
                </li>

                <li>
                    <a href="About.php" > About </a> 
                </li>

                <li>
                    <a href="javascript:void(0)"  > Your cart </a> 
                </li>

                <li>
                    <a href="javascript:void(0)"  > Search </a> 
                </li>
            </ul>
        </nav>

    </header>
    <?php
    /* Used to show the current credentials of the user stored in their database */
    $name = $_SESSION["User_Name"];
    $Lname = $_SESSION["Last_Name"];
    $email = $_SESSION["email"];
    $phone = $_SESSION["phone"];
    $address = $_SESSION["tel"];
    $pass = $_SESSION["pass"] ;

   
    /* */
    if (isset($_REQUEST["Edit"])) { // Execute the following if the form has been submitted 

        $condition = true;

        include '../config.php'; // importing config page, to use its properties
    
        $connect = OpenConnection(); // calling the function to connect to the database and storing its return value
    
        // create a main query that will take the values from the database 
    
        $MainQuery = "SELECT * FROM Customers WHERE Customer_email = '$email'";

        $Mainresult = mysqli_query($connect, $MainQuery) or die("Unable to connect to database!W"); // The result is then returned
    
        /* These new values will be passed on to the updated form instead of making another query to retrieve something that we already have */

        $newName = $_POST['Unam'];
        $newLame = $_POST['Lanam'];
        $newEmail = $_POST['E'];
        $newPhone = $_POST['T'];
        $newAddress = $_POST['Address'];
        $newPass = $_POST['p'];





        // Create a code that will check if any of the values have been changed 
        // If they have then insert them 
        // If the values ought to be unqiue then check that they are unique in the database if not then don't insert them and report to the user
    
        if ($name != $newName) { // Meaning that something has been changed , therefore update it on the database 
    
            // Customers (Customer_email, First_Name, Last_Name, Password, Address, phone)
            $UpdateQuery = "UPDATE Customers SET First_Name='$newName' WHERE Customer_email = '$email'"; // implication that the connection function was a success. Thus go to the next phase, return the user name of all the records.
    
            $result = mysqli_query($connect, $UpdateQuery) or die("Unable to connect to database!1"); // The result is then returned
        }

        if ($Lname != $newLame) {

            $UpdateQuery = "UPDATE Customers SET Last_Name='$newLame' WHERE Customer_email = '$email'"; // implication that the connection function was a success. Thus go to the next phase, return the user name of all the records.
    
            $result = mysqli_query($connect, $UpdateQuery) or die("Unable to connect to database!1"); // The result is then returned
        }



        if ($phone != $newPhone) {

            $UpdateQuery = "UPDATE Customers SET phone='$newPhone' WHERE Customer_email = '$email'"; // implication that the connection function was a success. Thus go to the next phase, return the user name of all the records.
    
            $result = mysqli_query($connect, $UpdateQuery) or die("Unable to connect to database!1"); // The result is then returned

        }

        if ($address != $newAddress) {

            $UpdateQuery = "UPDATE Customers SET Address='$newAddress' WHERE Customer_email = '$email'"; // implication that the connection function was a success. Thus go to the next phase, return the user name of all the records.
    
            $result = mysqli_query($connect, $UpdateQuery) or die("Unable to connect to database!1"); // The result is then returned

        }

        
        if($emial != $newEmail){ // The unique fields, If it is a different email from the one the user currently inserted 

            $AllQuery = "SELECT * FROM Customers WHERE Customer_email = '$newEmail'"; // Return all records , where their email's identical to what the user is trying to store 

            $result = mysqli_query($connect, $AllQuery) or die("Unable to connect to database!"); // Execute query then return the result
  
            $Allrecords = mysqli_num_rows($result); // is used to return the number of rows returned from the data base based on the query

            if ($Allrecords == 0) { // Then it means that the email to be inserted is unqiue and can thus be passed onto the database
    
                $UpdateQuery = "UPDATE Customers SET Customer_email='$newEmail' WHERE Customer_email = '$email'"; // Change Customer currents email
            }else {// Else return a error, letting the user know that an identical email already exists in the database

                $condition = false; // So that the last updated form is not displayed as well 

                session_unset(); // Destroying all current sessions , thus removing all current variables 
    
                $_SESSION["User_Name"] = $newName;
                $_SESSION["Last_Name"] = $newLame;
                $_SESSION["email"] = $email; // 
                $_SESSION["phone"] = $newPhone;
                $_SESSION["tel"] = $newAddress;
                $_SESSION["pass"] = $newPass;

                $oldEmail = $_SESSION["email"];

                echo "<div id=\"main2\" >
            <form action=\"Edit.php\" id=\"fomSign\" name=\"newAccountform\" method=\"post\"> 
            <table> <!-- Used to make sure that all the content are aligned -->
                <h2 style=\"font-family: Monospace font-size=large\"><img src=\"../Images/248961.png\" alt=\"Image of gear\" id=\"load2\" class=\"Icons\"> $newName </h2>
                <div>
                <tr><!-- First row-->
                    <td><input type=\"text\" class=\"field\" id=\"Uname\" name=\"Unam\"placeholder=\"First Name\" autofocus value=\"$newName\" required></td>
                </tr>
                
                <img src=\"../Images/user.png\" alt=\"Image of User\"  class=\"Icons\"> 
                <p style=\"color:red\"> Email: $newEmail  found in database, please try again </p>
            </div>

            <tr>
                <td><input type=\"text\" class=\"field\" id=\"Laname\" name=\"Lanam\" class=\"Icons1\" placeholder=\"Last Name\" value=\"$newLame\" required></td>
            </tr>

            <tr>
                <td><input type=\"email\" class=\"field\" id=\"Email\" name=\"E\" class=\"Icon1s\" placeholder=\"Email\" value=\"$oldEmail\" required></td>
            </tr>

            <tr>
                <td><input type=\"tel\" class=\"field\" id=\"Tele\" name=\"T\" class=\"Icon1s\" placeholder=\"Phone Number\" value=\"$newPhone\" required></td>
            </tr>

            <tr>
                <td><input type=\"text\" class=\"field\" id=\"Add\" name=\"Address\" class=\"Icons1\" placeholder=\"Address\" value=\"$newAddress\" required></td>
            </tr>

            <tr>
                <td> <input type=\"password\" class=\"field\" id=\"ps\" name=\"p\" class=\"Icons1\" placeholder=\"Password\" value=\"$newPass\" required pattern=\"^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,50}$\" title=\"Your Password must have at least one number and one uppercase and lowercase letter and one special character , and at least 8 or more characters\"> </td>
            </tr>
            
            <tr>
                <td> <input type=\"submit\" value=\"Edit\" id=\"SignUp\" name=\"Edit\"> </td>
            </tr>
            </table>
            </form>
            </div><br>";
            CloseConnection($connect); // Closing the connection 

            }
        
        }

        /*
        if ($pass != $newPass) {
        }
        // Then connect to the database and retrieve the new or old data 
        // change the session variables 
        // Reprint the form
        */

        if ($condition) {
            session_unset(); // Destroying all current sessions , thus removing all current variables 
    
            $_SESSION["User_Name"] = $newName;
            $_SESSION["Last_Name"] = $newLame;
            $_SESSION["email"] = $newEmail;
            $_SESSION["phone"] = $newPhone;
            $_SESSION["tel"] = $newAddress;
            $_SESSION["pass"] = $newPass;

            echo "<div id=\"main2\" >
            <form action=\"Edit.php\" id=\"fomSign\" name=\"newAccountform\" method=\"post\"> 
            <table> <!-- Used to make sure that all the content are aligned -->
                <h2 style=\"font-family: Monospace font-size=large\"><img src=\"../Images/248961.png\" alt=\"Image of gear\" id=\"load2\" class=\"Icons\"> $newName </h2>
                <div>
                <tr><!-- First row-->
                    <td><input type=\"text\" class=\"field\" id=\"Uname\" name=\"Unam\"placeholder=\"First Name\" autofocus value=\"$newName\" required></td>
                </tr>
                
                <img src=\"../Images/user.png\" alt=\"Image of User\"  class=\"Icons\"> 
            </div>

            <tr>
                <td><input type=\"text\" class=\"field\" id=\"Laname\" name=\"Lanam\" class=\"Icons1\" placeholder=\"Last Name\" value=\"$newLame\" required></td>
            </tr>

            <tr>
                <td><input type=\"email\" class=\"field\" id=\"Email\" name=\"E\" class=\"Icon1s\" placeholder=\"Email\" value=\"$newEmail\" required></td>
            </tr>

            <tr>
                <td><input type=\"tel\" class=\"field\" id=\"Tele\" name=\"T\" class=\"Icon1s\" placeholder=\"Phone Number\" value=\"$newPhone\" required></td>
            </tr>

            <tr>
                <td><input type=\"text\" class=\"field\" id=\"Add\" name=\"Address\" class=\"Icons1\" placeholder=\"Address\" value=\"$newAddress\" required></td>
            </tr>

            <tr>
                <td> <input type=\"password\" class=\"field\" id=\"ps\" name=\"p\" class=\"Icons1\" placeholder=\"Password\" value=\"$newPass\" required pattern=\"^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,50}$\" title=\"Your Password must have at least one number and one uppercase and lowercase letter and one special character , and at least 8 or more characters\"> </td>
            </tr>
            
            <tr>
                <td> <input type=\"submit\" value=\"Edit\" id=\"SignUp\" name=\"Edit\"> </td>
            </tr>
            </table>
            </form>
            </div><br>";
            CloseConnection($connect); // Closing the connection 
        }
    
    }else {

        echo "<div id=\"main2\" >
        <form action=\"Edit.php\" id=\"fomSign\" name=\"newAccountform\" method=\"post\"> 
        <table> <!-- Used to make sure that all the content are aligned -->
            <h2 style=\"font-family: Monospace font-size=large\"><img src=\"../Images/248961.png\" alt=\"Image of gear\" id=\"load2\" class=\"Icons\"> $name </h2>
            <div>
            <tr><!-- First row-->
                <td><input type=\"text\" class=\"field\" id=\"Uname\" name=\"Unam\"placeholder=\"First Name\" autofocus value=\"$name\" required></td>
            </tr>
            
            <img src=\"../Images/user.png\" alt=\"Image of User\"  class=\"Icons\"> 
        </div>

        <tr>
            <td><input type=\"text\" class=\"field\" id=\"Laname\" name=\"Lanam\" class=\"Icons1\" placeholder=\"Last Name\" value=\"$Lname\" required></td>
        </tr>

        <tr>
            <td><input type=\"email\" class=\"field\" id=\"Email\" name=\"E\" class=\"Icon1s\" placeholder=\"Email\" value=\"$email\" required></td>
        </tr>

        <tr>
            <td><input type=\"tel\" class=\"field\" id=\"Tele\" name=\"T\" class=\"Icon1s\" placeholder=\"Phone Number\" value=\"$phone\" required></td>
        </tr>

        <tr>
            <td><input type=\"text\" class=\"field\" id=\"Add\" name=\"Address\" class=\"Icons1\" placeholder=\"Address\" value=\"$address\" required></td>
        </tr>

        <tr>
            <td> <input type=\"password\" class=\"field\" id=\"ps\" name=\"p\" class=\"Icons1\" placeholder=\"Password\" value=\"$pass\" required pattern=\"^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,50}$\" title=\"Your Password must have at least one number and one uppercase and lowercase letter and one special character , and at least 8 or more characters\"> </td>
        </tr>
        
        <tr>
            <td> <input type=\"submit\" value=\"Edit\" id=\"SignUp\" name=\"Edit\"> </td>
        </tr>
        </table>
        </form>
    </div><br>";

    }

 ?>

<footer style="background-image:url(../Images/Background.jpg) ;">
        <h4 style="font-family:Serif; " > &copy;  Copyright <strong> Bit's Hardwares</strong> </h4>
        <p > <h5>All Rights Reserved </h5></p>
        <p > for more information click the following link: <a href="information.html" onMouseOver="this.style.color='#818181'" onMouseOut="this.style.color='#fc8129'" style="color: #fc8129;font-family: Monospace">click</a></p>
    </footer>

    
    <script type="text/javascript" src="../JavaScript/Profile/Sign.js"></script>

</body>
</html>