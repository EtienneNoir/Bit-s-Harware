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
    <?php
    if (isset($_REQUEST["Register"])) { // Execute the following if the form has been submitted 

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

          $Option1Results = mysqli_query($connect, $Option1Query) or die("Unable to connect to databasew!"); // Execute query then return the result
  
          CloseConnection($connect); // Closing the connection 

          echo "Successfully inserted data"; // Create a session and lead the customer to a subscribed version of the Website

      } else { // Now to make sure to let the customer know if their credentials are already in the database 
  
          while ($record = mysqli_fetch_array($result)) {

              if ($email == $record['Customer_email']) {

                  
                  echo $carry;
                  echo "<div id=\"main2\" >
                      <form style=\"height:850px\"action=\"Profile.php\" id=\"fomSign\" name=\"newAccountform\" method=\"post\"> 
                          <table> <!-- Used to make sure that all the content are aligned -->
                          <h2 style=\"font-family: Monospace font-size=large\"><img src=\"Images/248961.png\" alt=\"Image of gear\" id=\"load2\" class=\"Icons\"> Register </h2>
                          <div>
                              <tr><!-- First row-->
                              <td><input type=\"text\" class=\"field\" id=\"Uname\" name=\"Unam\"placeholder=\"First Name\" value=\"$name\"autofocus required></td>
                              </tr>
                              
                              <img src=\"Images/user.png\" alt=\"Image of User\"  class=\"Icons\"> 
                              <p style=\"color:red\"> Email found in database, please try again </p>
                          </div>

                          <tr>
                          <td><input type=\"text\" class=\"field\" id=\"Laname\" name=\"Lanam\" class=\"Icons1\" value=\"$Lname\" placeholder=\"Last Name\" required></td>
                          </tr>

                          <tr>
                          <td><input type=\"email\" class=\"field\" id=\"Email\" name=\"E\" class=\"Icon1s\" value=\"$email\" placeholder=\"Email\" required></td>
                          </tr>

                          <tr>
                          <td><input type=\"tel\" class=\"field\" id=\"Tele\" name=\"T\" class=\"Icon1s\" value=\"$phone\" placeholder=\"Phone Number\" required></td>
                          </tr>

                          <tr>
                          <td><input type=\"text\" class=\"field\" id=\"Add\" name=\"Address\" class=\"Icons1\" value=\"$address\" placeholder=\"Address\" required></td>
                          </tr>

                          <tr>
                          <td> <input type=\"password\" class=\"field\" id=\"ps\" name=\"p\" class=\"Icons1\" value=\"$pass\" placeholder=\"Password\" required pattern=\"^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,50}$\" title=\"Your Password must have at least one number and one uppercase and lowercase letter and one special character , and at least 8 or more characters\"> </td>
                          </tr>
                          
                          <tr>
                          <td> <input type=\"submit\" value=\"Create Account\" id=\"SignUp\" name=\"Register\"> </td>
                          </tr>
                          </table>
                          
                          <span> Already Have an Account? </span> <a class=\"button\" id=\"Log\" style=\"color: #fc8129;\" href=\"LogedIn.php\">Log In</a>
                      </form>
                      </div>
                      <!--Java Script will be used to show this when the sign in button is selecetd if the user already has an account -->";
                      CloseConnection($connect); // Closing the connection 
                  break;

              } else if ($pass == $record['Password']) { // If an equivalent password is found then show an error 

                  echo "<div id=\"main2\" >
                  <form style=\"height:850px\"action=\"Profile.php\" id=\"fomSign\" name=\"newAccountform\" method=\"post\"> 
                      <table> <!-- Used to make sure that all the content are aligned -->
                      <h2 style=\"font-family: Monospace font-size=large\"><img src=\"Images/248961.png\" alt=\"Image of gear\" id=\"load2\" class=\"Icons\"> Register </h2>
                      <div>
                          <tr><!-- First row-->
                          <td><input type=\"text\" class=\"field\" id=\"Uname\" name=\"Unam\"placeholder=\"First Name\" value=\"$name\"autofocus required></td>
                          </tr>
                          
                          <img src=\"Images/user.png\" alt=\"Image of User\"  class=\"Icons\"> 
                          <p style=\"color:red\"> Please insert a different password </p>
                      </div>

                      <tr>
                      <td><input type=\"text\" class=\"field\" id=\"Laname\" name=\"Lanam\" class=\"Icons1\" value=\"$Lname\" placeholder=\"Last Name\" required></td>
                      </tr>

                      <tr>
                      <td><input type=\"email\" class=\"field\" id=\"Email\" name=\"E\" class=\"Icon1s\" value=\"$email\" placeholder=\"Email\" required></td>
                      </tr>

                      <tr>
                      <td><input type=\"tel\" class=\"field\" id=\"Tele\" name=\"T\" class=\"Icon1s\" value=\"$phone\" placeholder=\"Phone Number\" required></td>
                      </tr>

                      <tr>
                      <td><input type=\"text\" class=\"field\" id=\"Add\" name=\"Address\" class=\"Icons1\" value=\"$address\" placeholder=\"Address\" required></td>
                      </tr>

                      <tr>
                      <td> <input type=\"password\" class=\"field\" id=\"ps\" name=\"p\" class=\"Icons1\" value=\"$pass\" placeholder=\"Password\" required pattern=\"^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,50}$\" title=\"Your Password must have at least one number and one uppercase and lowercase letter and one special character , and at least 8 or more characters\"> </td>
                      </tr>
                      
                      <tr>
                      <td> <input type=\"submit\" value=\"Create Account\" id=\"SignUp\" name=\"Register\"> </td>
                      </tr>
                      </table>
                      
                      <span> Already Have an Account? </span> <a class=\"button\" href=\"LogedIn.php\" id=\"Log\" style=\"color: #fc8129;\" \">Log In</a>
                  </form>
                  </div>
                  <!--Java Script will be used to show this when the sign in button is selecetd if the user already has an account -->";
                  CloseConnection($connect); // Closing the connection 
                  break;

              }

              else{

                  $Allrecords --; // so everytime a search is done with a single record, this is decremented, is a denotation of the records being traversed
              }


          }// This can 

          if ($Allrecords == 0) { // once the values have been compared to the values in all the records and no error is generated execute the following code can be executed, an implication that the user can be added
  
              $Option1Query = "INSERT INTO Customers (Customer_email, First_Name, Last_Name, Password, Address, phone)
                      VALUES ('$email','$name','$Lname','$pass','$address','$phone')";

              $Option1Results = mysqli_query($connect, $Option1Query) or die("Unable to connect to databasew!"); // Execute query then return the result
      
              CloseConnection($connect); // Closing the connection 

              echo "Successfully inserted data";// Create a session and lead the customer to a subscribed version of the Website
              

          }

      }

    } else { // If the form has not been submitted, show an unsubmitted form 


        echo "<div id=\"main2\" >
        <form action=\"Profile.php\" id=\"fomSign\" name=\"newAccountform\" method=\"post\"> 
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
          
          <span> Already Have an Account? </span> <a  href=\"LogedIn.php\" class=\"button\" id=\"Log\" style=\"color: #fc8129;\">Log In</a>
        </form>
      </div><br>";


    }


    

    ?>
  
    
    <footer style="background-image:url(Images/Background.jpg) ;">
        <h4 style="font-family:Serif; " > &copy;  Copyright <strong> Bit's Hardwares</strong> </h4>
        <p > <h5>All Rights Reserved </h5></p>
        <p > for more information click the following link: <a href="information.html" onMouseOver="this.style.color='#818181'" onMouseOut="this.style.color='#fc8129'" style="color: #fc8129;font-family: Monospace">click</a></p>
    </footer>

    
    <script type="text/javascript" src="JavaScript/Profile/Sign.js"></script>

</body>
</html>