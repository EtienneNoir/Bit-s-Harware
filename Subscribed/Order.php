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
                    <a href="Cart.php"> Cart <div id="quantity"> <?php echo $_SESSION['Quantity']; ?></div>  </a> 
                </li>
            </ul>
        </nav>

    </header>
  
    <?php

    echo "<div id=\"Order\">";
    $Customer_id = $_SESSION["id"];
    $email = $_SESSION["email"];
    $phone = $_SESSION["phone"];
    $address = $_SESSION["tel"];

    $connect = OpenConnection(); // calling the function to connect to the database and storing its return value


    include '../config.php'; // importing config page, to use its properties

    echo "<div style=\"border-style:solid; border-color: green; width: 400px;\">";


    echo "</div>";
    echo "<br><br>";
    
    ?>
 
    <footer style="background-image:url(../Images/Background.jpg) ;">
        <h4 style="font-family:Serif; " > &copy;  Copyright <strong> Bit's Hardwares</strong> </h4>
        <p > <h5>All Rights Reserved </h5></p>
        <p > for more information click the following link: <a href="information.html" onMouseOver="this.style.color='#818181'" onMouseOut="this.style.color='#fc8129'" style="color: #fc8129;font-family: Monospace">click</a></p>
    </footer>

    

</body>
</html>