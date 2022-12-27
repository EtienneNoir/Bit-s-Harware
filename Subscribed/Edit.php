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

    $id = $_SESSION["id"];
    /* Used to show the current credentials of the user stored in their database */
    /*

        $name = $_SESSION["User_Name"];
        $Lname = $_SESSION["Last_Name"];
        $email = $_SESSION["email"];
        $phone = $_SESSION["phone"];
        $address = $_SESSION["tel"];
        $pass = $_SESSION["pass"] ;
        $id = $_SESSION["id"];

    */
  
    /* */
    if (isset($_REQUEST["Edit"])) { // Execute the following if the form has been submitted 
        include '../config.php'; // importing config page, to use its properties
    

        $connect = OpenConnection(); // calling the function to connect to the database and storing its return value
    
        $IdQuery = "SELECT * FROM Customers WHERE Customer_id = '$id'";

        $idResult = mysqli_query($connect, $IdQuery) or die("Unable to connect to database!"); // Execute query then return the result

        $recordsid = mysqli_fetch_array($idResult);

       
        /* To be used just in case the update failed */
        $name =  $recordsid["First_Name"];
        $Lname =  $recordsid["Last_Name"];
        $email =  $recordsid["Customer_email"];
        $phone =  $recordsid["phone"];
        $address =  $recordsid["Address"];
        $pass =  $recordsid["Password"] ;
        $newId = $recordsid['Customer_id'];
    
        /* These new values will be passed on to the updated form instead of making another query to retrieve something that we already have */

        $newName = $_POST['Unam'];
        $newLame = $_POST['Lanam'];
        $newEmail = $_POST['E'];
        $newPhone = $_POST['T'];
        $newAddress = $_POST['Address'];
        $newPass = $_POST['p'];

        $entry = 0 ;
        while ($entry != 1) {
            // create a main query that will take the values from the database 
            if ($newEmail != $recordsid['Customer_email']) { // meaning something has been changed if the new email to be updated is not equal to the email in the database record of this user
    

                $MainQuery = "SELECT * FROM Customers WHERE Customer_email = '$newEmail'"; // To see if there are other records with the same email 
    
                $Mainresult = mysqli_query($connect, $MainQuery) or die("Unable to connect to database!W"); // The result is then returned
    
                $Allrecords = mysqli_num_rows($Mainresult); // is used to return the number of rows returned from the data base based on the query

                
         
    
                if ($Allrecords != 0) { // Thus it means that the new email exists in the databse , thus cannot be inserted, user must try again  
    
                    echo "<div id=\"main2\" >
                    <form action=\"Edit.php\" id=\"fomSign\" name=\"newAccountform\" method=\"post\" style=\"850px\"> 
                    <table> <!-- Used to make sure that all the content are aligned -->
                        <h2 style=\"font-family: Monospace font-size=large\"><img src=\"../Images/248961.png\" alt=\"Image of gear\" id=\"load2\" class=\"Icons\"> $name </h2>
                        <div>
                        <tr><!-- First row-->
                            <td><input type=\"text\" class=\"field\" id=\"Uname\" name=\"Unam\"placeholder=\"First Name\" autofocus value=\"$name\" required></td>
                        </tr>
                        
                        <img src=\"../Images/user.png\" alt=\"Image of User\"  class=\"Icons\"> 
                        <p style=\"color:red\"> Email: $newEmail already exists in the database, please try again</p>
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
            
                    CloseConnection($connect); // Closing the connection
                    break;

                } else {

                    // Create a code that will check if any of the values have been changed 
                    // If they have then insert them 
                    // If the values ought to be unqiue then check that they are unique in the database if not then don't insert them and report to the user
                    $EmailQuery = "UPDATE Customers SET Customer_email='$newEmail' WHERE Customer_id = '$id'"; // implication that the connection function was a success. Thus go to the next phase, return the user name of all the records.
    
                    $resultEmail = mysqli_query($connect, $EmailQuery) or die("Unable to connect to database!1"); // The result is then returned
    
                    // Do nothing this will simply be carried over
                }

            }

            if ($newPass != $recordsid['Password']) { // Using the same logic that was used to identify any duplicates newEmail to be insterted in the database and then reporting it to the user
    

                $MainQuery = "SELECT * FROM Customers WHERE Password = '$newPass'"; // To see if there are other records with the same email 
    
                $Mainresult = mysqli_query($connect, $MainQuery) or die("Unable to connect to database!W"); // The result is then returned
    
                $Allrecords = mysqli_num_rows($Mainresult); // is used to return the number of rows returned from the data base based on the query
    
                if ($Allrecords != 0) { // Thus it means that the new password exists in the databse , thus cannot be inserted, show user error  
    
                    echo "<div id=\"main2\" >
                    <form action=\"Edit.php\" id=\"fomSign\" name=\"newAccountform\" method=\"post\" style=\"height:850px\"> 
                    <table> <!-- Used to make sure that all the content are aligned -->
                        <h2 style=\"font-family: Monospace font-size=large\"><img src=\"../Images/248961.png\" alt=\"Image of gear\" id=\"load2\" class=\"Icons\"> $name </h2>
                        <div>
                        <tr><!-- First row-->
                            <td><input type=\"text\" class=\"field\" id=\"Uname\" name=\"Unam\"placeholder=\"First Name\" autofocus value=\"$name\" required></td>
                        </tr>
                        
                        <img src=\"../Images/user.png\" alt=\"Image of User\"  class=\"Icons\"> 
                        <p style=\"color:red\"> Please insert a different password </p>
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
            
                    CloseConnection($connect); // Closing the connection
                    break;

                } else {

                    // Create a code that will check if any of the values have been changed 
                    // If they have then insert them 
                    // If the values ought to be unqiue then check that they are unique in the database if not then don't insert them and report to the user
                    $EmailQuery = "UPDATE Customers SET Password = '$newPass' WHERE Customer_id = '$id'"; // implication that the connection function was a success. Thus go to the next phase, return the user name of all the records.
    
                    $resultEmail = mysqli_query($connect, $EmailQuery) or die("Unable to connect to database!1"); // The result is then returned
    


                    // Update and do nothing
                    echo "Suceess";
                    

                }

            }

            session_unset(); // Destroying all current sessions , thus removing all current variables 
    
            $_SESSION["email"] = $newEmail;

            $_SESSION["pass"] = $newPass;

            $_SESSION["id"] = $newId;

            CloseConnection($connect); // Closing the connection 
            echo "Success!";
            break;

        }
    
    }
    else {


        include '../config.php'; // importing config page, to use its properties
    

        $connect = OpenConnection(); // calling the function to connect to the database and storing its return value
    
        $IdQuery = "SELECT * FROM Customers WHERE Customer_id = '$id'";

        $idResult = mysqli_query($connect, $IdQuery) or die("Unable to connect to database!"); // Execute query then return the result

        $recordsid = mysqli_fetch_array($idResult);

        $name =  $recordsid["First_Name"];
        $Lname =  $recordsid["Last_Name"];
        $email =  $recordsid["Customer_email"];
        $phone =  $recordsid["phone"];
        $address =  $recordsid["Address"];
        $pass =  $recordsid["Password"] ;
 

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

    CloseConnection($connect); // Closing the connection 

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