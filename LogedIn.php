<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Index/Navigation/nav&Title.css">
    <link rel="stylesheet" href="CSS/Index/TableMain.css">
    <link rel="stylesheet" href="CSS/Index/Footer.css">
    <link rel="stylesheet" href="CSS/Animation.css">
    <link rel="icon" type="png" href="Images/favicon.png">
    <link rel="stylesheet" href="CSS/Sign/Sign.css">
    <title>Bit's Hardwares</title>
    <style> 

        @media screen and (max-width:  1900px) {  /* On screens that are  1900 wide or less, zoom out to 67 % */
            body {
            zoom : 67%;
            }
        }
    </style>

</head>
<body style="background-image:url(Images/Background.jpg) ; margin:auto; width: fit-content;">
    <h2 id="title"> <img src="Images/favicon.png" alt="Image of CPU" id="animation"> <Strong> Bit's Hardwares </Strong> </h2>

    <header>

        <nav id="nav">
            <ul>
                <li>
                    <a href="index.php" > Home </a> 
                </li>

                <li>
                    <div id="dropdown">
                        <a href="javascript:void(0)"> Search </a>
                            <div class="dropdown-content" id="tabl2">
                                <form action="Profile.php" id="Form2" name="Search1">
                                    <table>
                                        <tr>
                                            <td> <input type="text" id="in" placeholder="Search.." name="search" style="height: 45px; width: 210px; border-radius: 15px; text-align: center;"> </td>
                                            <td> <button type="submit" id="Se" class="glowEffect">&#128269;</button> </td>
                                        </tr> 
                                    </table> 
                                </form>
                            </div>
                    </div>
                </li>


                <li>
                    <a href="Profile.php"  > Your cart </a> 
                </li>

                <li>
                    <a href="About.html" > About </a> 
                </li>
            </ul>
        </nav>

    </header>
<?php // Need to do a write documentation for this project 

/* This page verifies the User's Log in , successful log in will create a session to all the subscribed pages */
    
    include 'config.php'; // importing config page, to use its properties

    $connect = OpenConnection(); // calling the function to connect to the database and storing its return value

    if (isset($_REQUEST["SignUp"])) {

        $password = $_POST['p'];

        $email = $_POST['E'];

        $query = "SELECT * FROM Customers WHERE Customer_email = '$email' AND Password = '$password'"; // Return all records where all the specified conditions are met 

        $result = mysqli_query($connect, $query) or die("Unable to connect to database!"); // Execute query then return the result

        $record = mysqli_fetch_array($result);
    
        $Allrecords = mysqli_num_rows($result); // is used to return the number of rows returned from the database based on the query
    
        if ($Allrecords == 0) { //an implication that the user passed on the wrong credentials or the user is simply not in the database
    
            echo "<div id=\"LogIn\">
            <form style=\"height: 460px\" action=\"LogedIn.php\" id=\"fomSign2\" name=\"OldAccount\" method=\"post\"> <!-- Post method, used to post things on the database -->
            <table> <!-- Used to make sure that all the content are aligned -->
                <h2 style=\"font-family: Monospace font-size=large\"><img src=\"Images/248961.png\" alt=\"Image of gear\" id=\"load\" class=\"Icons\" > Log In </h2>
                <div>
                
                <img src=\"Images/user.png\" alt=\"Image of User\"  class=\"Icons\"> 
                <p style=\"color:red\"> Customer not found, please enter the correct credentials </p>
            </div>

            <tr>
                <td><input autofocus type=\"email\" class=\"field\" id=\"Email\" name=\"E\" class=\"Icon1s\" placeholder=\"Email\" autofocus required ></td>
            </tr>

            <tr>
                <td> <input type=\"password\" class=\"field\" id=\"ps\" name=\"p\" class=\"Icons1\" placeholder=\"Password\" required> </td>
            </tr>
            
            <tr>
                <td> <input type=\"submit\" value=\"Log In\" id=\"SignUp\" name=\"SignUp\"> </td>
            </tr>
            </table>

            <span> Don't have an Account ? </span> <a href=\"Profile.php\" class=\"button\" id=\"Log\" style=\"color: #fc8129;\" \">Register</a>
            </form>
        </div><br>";


        }

        else{

            $name = $record['First_Name'];
            $Lname = $record['Last_Name'];
            $address = $record['Address'];
            $phone = $record['phone'];
            $email = $record['Customer_email'];
            $phone = $record['phone'];
            $pass = $record['Password'];
            $id =  $record["Customer_id"];

            session_start();// Create a session and lead the customer to a subscribed version of the Website

            $_SESSION['Quantity'] = 0;
            $_SESSION["User_Name"] = $name;
            $_SESSION["Last_Name"] = $Lname;
            $_SESSION["email"] = $email;
            $_SESSION["phone"] = $phone;
            $_SESSION["tel"] = $address;
            $_SESSION["pass"] = $pass;
            $_SESSION["id"] = $id;

            CloseConnection($connect); // Closing the connection 

           header("Location: /Subscribed/index2.php");

        }


    } else {//Show this if the form was not submitted , thus show an unsubmitted form


   
    echo "<div id=\"LogIn\"  >
        <form action=\"LogedIn.php\" id=\"fomSign2\" name=\"OldAccount\" method=\"post\"> <!-- Post method, used to post things on the database -->
          <table> <!-- Used to make sure that all the content are aligned -->
            <h2 style=\"font-family: Monospace font-size=large\"><img src=\"Images/248961.png\" alt=\"Image of gear\" id=\"load\" class=\"Icons\" > Log In </h2>
            <div>
              
               <img src=\"Images/user.png\" alt=\"Image of User\"  class=\"Icons\"> 
          </div>

          <tr>
            <td><input autofocus type=\"email\" class=\"field\" id=\"Email\" name=\"E\" class=\"Icon1s\" placeholder=\"Email\" autofocus required ></td>
          </tr>

          <tr>
            <td> <input type=\"password\" class=\"field\" id=\"ps\" name=\"p\" class=\"Icons1\" placeholder=\"Password\" required> </td>
          </tr>
          
          <tr>
            <td> <input type=\"submit\" value=\"Log In\" id=\"SignUp\" name=\"SignUp\"> </td>
          </tr>
          </table>

          <span> Don't have an Account ? </span> <a href=\"Profile.php\" class=\"button\" id=\"Log\" style=\"color: #fc8129;\">Register</a>
        </form>
      </div><br>";

      
    }
?>
    <footer style="background-image:url(Images/Background.jpg) ;">
        <h4 style="font-family:Serif; " > &copy;  Copyright <strong> Bit's Hardwares</strong> </h4>
        <p > <h5>All Rights Reserved </h5></p>
    </footer>

    <script type="text/javascript" src="JavaScript/Profile/Sign.js"> </script>

</body>
</html>