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
    <title>Document</title>

</head>


<body style="background-image:url(Images/Background.jpg) ;">
    <h2 id="title"> <img src="Images/favicon.png" alt="Image of CPU" id="animation"> <Strong> Bit's Hardwares </Strong> </h2>

    <header>

        <nav id="nav">
            <ul>
                <li>
                    <a href="javascript:void(0)" > Home </a> 
                </li>

                <li>
                    <a href="javascript:void(0)" > Profile </a> 
                </li>

                <li>
                    <a href="javascript:void(0)" > about </a> 
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

    <div id="main">
        <?php
            include 'config.php'; // importing config page, to use its properties

            $connect = OpenConnection(); // calling the function to connect to the database and storing its return value

            $query = "SELECT * FROM Category";

            $results = mysqli_query($connect, $query) or die("Unable to retrieve data!");// Execute query using specified connection 

            $results1 = mysqli_query($connect, $query) or die("Unable to retrieve data!");// Execute query using specified connection 

            echo "<table>";
           
            echo "<tr>"; // Creating the first row of the table

            /* 
            
                * What the following code does : 
                * While there are still records or rows in the array execute the inner loop 
                * In the inner loop execute the code in the if statements only three times and increments the $index variable to ensure of this
                * This is done to have one row of four items so that another code can be put together to output another row
            
            */

        
        
            $index = 0; 

            while ($records = mysqli_fetch_array($results)) {

                if ($index <= 3){

                    $names = $records["Category_id"]; // Using global variable Post to access data sent via Post method
                    $image = $records["Category_Image"];
                    $name =  $records["Category_Name"];
                    $description = $records["Category_Description"];
                    $alt = $records["Alt"];
                    $href = $records["href"];
                        
                    echo "<td>";
                    echo "<a href=\"$href\" title=\"$description\" class=\"tool\">";
                    echo "<img src=\"$image\" alt=\"$alt\" width=\"450\" height=\"380\">";
                    echo "</a>";
                    echo "</td>";

                    $index = $index + 1;

                }

            }

            echo "</tr>"; // Creating the first row of the table


            echo "<tr>"; // Creating the second row of the table that will hold its four items 

            $count = 0 ; 
            if ($records = mysqli_fetch_array($results1)) {

               // if ($count > 3){ // Thus only print this once $count is bigger than 3 which is an indication that the categories that we dont want to be reprinted have been traversed 

                    $names = $records["Category_id"]; // Using global variable Post to access data sent via Post method
                    $image = $records["Category_Image"];
                    $name =  $records["Category_Name"];
                    $description = $records["Category_Description"];
                    $alt = $records["Alt"];
                    $href = $records["href"];
                        
                    echo "<td>";
                    echo "<a href=\"$href\" title=\"$description\" class=\"tool\">";
                    echo "<img src=\"$image\" alt=\"$alt\" width=\"450\" height=\"380\">";
                    echo "</a>";
                    echo "</td>";

               // } else {
                
               //   $count = $count + 1; // Everytime we don't execute the code in the if statement this is incremented to make sure we eventually print out everything
               // }
            } else {

                echo "qwqrwqruffsaugbziuaahzudinhqihzaihuduihnu";

            }

            

            echo "</tr>";
            
            


    
            echo "</table>";
        ?>
        
    </div>
 
    <footer style="background-image:url(Images/Background.jpg) ;">
        <h4 style="font-family:Serif; " > &copy;  Copyright <strong> Bit's Hardwares</strong> </h4>
        <p > <h5>All Rights Reserved </h5></p>
        <p > for more information click the following link: <a href="information.html" onMouseOver="this.style.color='#818181'" onMouseOut="this.style.color='#fc8129'" style="color: #fc8129;font-family: Monospace">click</a></p>
    </footer>

    

</body>
</html>