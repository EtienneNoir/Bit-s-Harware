<?php
session_start();
$_SESSION['Quantity'];// Indicating the amount of items the user has in the cart
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
    <link rel="stylesheet" href="../CSS/Cart/Quantity.css">
    <link rel="stylesheet" href="../CSS/Search/Search.css">
    <link rel="stylesheet" href="../CSS/Cart/Cart.css">
    <title>Bit's Hardwares</title>
    <style> 

        @media screen and (max-width:  1900px) {  /* On screens that are  1900 wide or less, zoom out to 67 % */
            body {
            zoom : 68%;
            }
        }
    </style>

</head>


<body style="background-image:url(../Images/Background.jpg) ; width: fit-content; margin:auto;">
    <h2 id="title"> <img src="../Images/favicon.png" alt="Image of CPU" id="animation"> <Strong> Bit's Hardwares </Strong> </h2>

    <header>

        <?php 

        include '../config.php'; // importing config page, to use its properties

        $connect = OpenConnection(); // calling the function to connect to the database and storing its return value

        $user_Name = $_SESSION["User_Name"];

        if (isset($_REQUEST["Cart"])) { // insert item to cart once the user submits the add item to cart form

            $Customer_id = $_SESSION["id"];

            $ProDuct_id = $_POST['P_id'];

            $Price = $_POST['Price'];

            $CartQuery = "INSERT INTO Cart_Item(Customer_id, Product_id, Price) VALUES ('$Customer_id' ,  '$ProDuct_id' ,  '$Price')"; // Storing the Product id and the Customer id, thus the item and who bought it

            $AddToCartResult = mysqli_query($connect , $CartQuery) or die("Unable to retrieve dataw!");// Execute query using specified connection);

            $_SESSION['Quantity'] = $_SESSION['Quantity'] + 1; // Used to indicate how many items the user has in the cart        

        }

        $quantity = $_SESSION['Quantity'];

        

        echo"<nav id=\"nav\">
            <ul>
                <li>
                    <a href=\"index2.php\" > Home </a> 
                </li>

                
                <li>
                    <div id=\"dropdown\">
                        <a href=\"javascript:void(0)\"> <b> $user_Name </b> <img src=\"../Images/user.png\" alt=\"Image of User\"  class=\"Icons\"> </a>
                            <div class=\"dropdown-content\" id=\"table1\">
                                <form action=\"\" id=\"Form2\">
                                    <table>
                                        <tr>
                                            <div id=\"Log\" style=\"padding-bottom:10px;\">
                                                <button class=\"glowEffect\" > <a href=\"Edit.php\" >Account Settings</a></button>
                                            </div>
                                       
                                            <div id=\"Log\">
                                                <button class=\"glowEffect\" ><a href=\"../index.php\" >Log out</a></button>
                                            </div>
                                        </tr> 
                                    </table> 
                                </form>
                            </div>
                    </div>
                </li>


                <li>
                    <div id=\"dropdown\">
                        <a href=\"javascript:void(0)\"> Search </a>
                            <div class=\"dropdown-content\" id=\"tabl2\">
                                <form action=\"Search.php\" id=\"Form2\" name=\"Search1\">
                                    <table>
                                        <tr>
                                            <td> <input type=\"text\" id=\"in\" placeholder=\"Search..\" name=\"search\" style=\"height: 45px; width: 210px; border-radius: 15px; text-align: center;\"> </td>
                                            <td> <button type=\"submit\" id=\"Se\" class=\"glowEffect\">&#128269;</button> </td>
                                        </tr> 
                                    </table> 
                                </form>
                            </div>
                    </div>
                </li>

                <li>
                    <a href=\"Cart.php\"> Your Cart <div id=\"quantity\"> $quantity</div>  </a> 
                </li>


                <li>
                    <a href=\"About.php\" > About </a> 
                </li>


            </ul>
        </nav>

    </header>";



    echo"<div id=\"main\">";
 

            $search = $_REQUEST["search"];

            $Searchquery = "SELECT * FROM Product WHERE Product_Name LIKE '$search%'"; // Name starts with 

            $Searchresults = mysqli_query($connect, $Searchquery) or die("Unable to retrieve data!");// Execute query using specified connection 

            echo "<div id=\"CartMain\">";

                echo "<ul id=\"items\">";

                while ($Search_Info = mysqli_fetch_array($Searchresults)) {

                    $product_id = $Search_Info["Product_Id"]; // Using global variable Post to access data sent via Post method
                    $image = $Search_Info["Product_Image"];
                    $name = $Search_Info["Product_Name"];
                    $description = $Search_Info["description"];
                    $price = $Search_Info['Price'];
                    $alt = $Search_Info["alt"];


                

                    echo "<li>";
                    echo"<div id=\"popMessage\";> 
                

                    <div id=\"close\"> x </div> 
                    
                    <div id=\"image\"> 
            
                        <img id=\"images\" src=\"../$image\" width=\"450\" height=\"380\"/>
            
                    </div>
            
            
                    <div id=\"content\">
            
                        <h3 id=\"h3\"> $name </h3> 
            
                        <h4> Key Features: </h4>
                        <p id=\"about\">  $description </p>
            
                    
                        <h4 id=\"price\"> R $price </h4>
            
                    </div>
            
            
                    <div>
                        
                        
                        <!-- Create a form that will hold just the id of the product , Php will then be used to store or put the product in the -->
                        <form action=\"Search.php?id=$search\" method=\"post\">
                            <input type=\"hidden\" name=\"P_id\" value=\"$product_id\" id=\"ids\">
                            <input type=\"hidden\" name=\"Price\" value=\"$price\" id=\"Prices\">
                            <input type=\"submit\" value=\"Add Item to Cart\" id=\"btn\" name=\"Cart\">
                        </form>
                    </div>
            
            
                    </div>";
                


                    echo "</li><br>";
                }
                echo "</ul><br>";

                CloseConnection($connect); // Closing the connection 

        echo "</div>";
        echo "<br><br>";

        ?>
        
    </div>
 
    <footer style="background-image:url(../Images/Background.jpg) ;">
        <h4 style="font-family:Serif; " > &copy;  Copyright <strong> Bit's Hardwares</strong> </h4>
        <p > <h5>All Rights Reserved </h5></p>
        <p > for more information click the following link: <a href="information.html" onMouseOver="this.style.color='#818181'" onMouseOut="this.style.color='#fc8129'" style="color: #fc8129;font-family: Monospace">click</a></p>
    </footer>
</body>
</html>