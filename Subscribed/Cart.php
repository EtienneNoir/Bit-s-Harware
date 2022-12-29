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
    <link rel="stylesheet" href="../CSS/Cart/Cart.css">
    <title>Bit's Hardwares</title>

</head>


<body style="background-image:url(../Images/Background.jpg) ; margin:auto; width: fit-content;">
    <h2 id="title"> <img src="../Images/favicon.png" alt="Image of CPU" id="animation"> <Strong> Bit's Hardwares </Strong> </h2>

    <header id="headerCart">

        <nav id="nav">
            <ul>
                <li>
                    <a href="index2.php" > Home </a> 
                </li>

                <li>
                    <a href="Edit.php" > <?php echo $_SESSION["User_Name"]; ?> <img src="../Images/user.png" alt="Image of User"  class="Icons"> </a> 
                </li>

                <li>
                    <a href="About.php" > about </a> 
                </li>

                <li>
                    <a href="javascript:void(0)"  > Search </a> 
                </li>
            </ul>
        </nav>

    </header>
  
    <?php

    $Customer_id = $_SESSION["id"];


    // Retrieve all the items stored in the Cart_Item table linked to the current user (Customer_id); 
    // Retrieve the Product_id and get its information like price, feature from the product table

    include '../config.php'; // importing config page, to use its properties
    

    $connect = OpenConnection(); // calling the function to connect to the database and storing its return value

    $IdQuery = "SELECT * FROM Cart_Item WHERE Customer_id = '$Customer_id'";

    $idResult = mysqli_query($connect, $IdQuery) or die("Unable to connect to database!"); // Execute query then return the result


    echo "<ul>";
    while ($recordsid = mysqli_fetch_array($idResult)){

        $Product_id = $recordsid['Product_id'];

        
        $Product_Query = "SELECT * FROM Product WHERE Product_id = '$Product_id'";

        $Product_Result = mysqli_query($connect, $Product_Query) or die("Unable to connect to database!"); // Execute query then return the result

        $Product_Info = mysqli_fetch_array($Product_Result);

        $image = $Product_Info["Product_Image"];
        $about = $Product_Info["description"];
        $price = $Product_Info['Price'];

    
        echo "<li>";
        
        
        
        echo"<div id=\"Cart\">
        


        

        <div id=\"popMessage\"> 

            <div id=\"close\"> x </div> 
            
            <div id=\"image\"> 

                <img id=\"images\" src=\"../$image\" alt=\"\"  width=\"450\" height=\"380\"/>

            </div>


            <div id=\"content\">

                <h3 id=\"h3\"> </h3> 

                <h4> Key Features: </h4>
                <p id=\"about\">
                    $about
                </p>

                
                <h4 id=\"price\"> $price </h4>

            </div>


        


        </div>";

        echo "</li>";
    }
    echo "</ul>";

    echo"<br><br>";

    ?>
 
    <footer style="background-image:url(../Images/Background.jpg) ;">
        <h4 style="font-family:Serif; " > &copy;  Copyright <strong> Bit's Hardwares</strong> </h4>
        <p > <h5>All Rights Reserved </h5></p>
        <p > for more information click the following link: <a href="information.html" onMouseOver="this.style.color='#818181'" onMouseOut="this.style.color='#fc8129'" style="color: #fc8129;font-family: Monospace">click</a></p>
    </footer>

    

</body>
</html>