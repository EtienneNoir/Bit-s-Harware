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
                    <a href="About.html" > About </a> 
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

                // Then take results obtained from the initial query, go through every records and find any values in the database that is identical to the user's credentials
                while ($record = mysqli_fetch_array($result)) { 

                        if ($email == $record['Customer_email']) {

                            $carry = "Email already contained in database, please try again";
                            
                    echo "div id=\"main2\" >
                        <form action=\"MidPoint.php\" id=\"fomSign\" name=\"newAccountform\" method=\"post\"> 
                            <table> <!-- Used to make sure that all the content are aligned -->
                            <h2 style=\"font-family: Monospace font-size=large\"><img src=\"Images/248961.png\" alt=\"Image of gear\" id=\"load2\" class=\"Icons\"> Register </h2>
                            <div>
                                <tr><!-- First row-->
                                <td><input type=\"text\" class=\"field\" id=\"Uname\" name=\"Unam\"placeholder=\"First Name\" autofocus required></td>
                                </tr>
                                
                                <img src=\"Images/user.png\" alt=\"Image of User\"  class=\"Icons\"> 
                            </div>

                            <tr>
                            <td><input type=\"text\" class=\"field\" id=\"Laname\" name=\"Lanam\" class=\"Icons1\" placeholder=\"Last Name\" required></td>
                            </tr>

                            <tr>
                            <td><input type=\"email\" class=\"field\" id=\"Email\" name=\"E\" class=\"Icon1s\" placeholder=\"Email\" required></td>
                            </tr>

                            <tr>
                            <td><input type=\"tel\" class=\"field\" id=\"Tele\" name=\"T\" class=\"Icon1s\" placeholder=\"Phone Number\" required></td>
                            </tr>

                            <tr>
                            <td><input type=\"text\" class=\"field\" id=\"Add\" name=\"Address\" class=\"Icons1\" placeholder=\"Address\" required></td>
                            </tr>

                            <tr>
                            <td> <input type=\"password\" class=\"field\" id=\"ps\" name=\"p\" class=\"Icons1\" placeholder=\"Password\" required pattern=\"^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,50}$\" title=\"Your Password must have at least one number and one uppercase and lowercase letter and one special character , and at least 8 or more characters\"> </td>
                            </tr>
                            
                            <tr>
                            <td> <input type=\"submit\" value=\"Create Account\" id=\"SignUp\" name=\"Register\"> </td>
                            </tr>
                            </table>
                            
                            <span> Already Have an Account? </span> <a class=\"button\" id=\"Log\" style=\"color: #fc8129;\" onclick=\"LogIn()\">Log In</a>
                        </form>
                        </div>";
      
   
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