<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

            echo "<table>";
            $index = 0;
            echo "<tr>"; // Creating the first row of the table
            while ($index <= 3){
                while ($records = mysqli_fetch_array($results)) {

                    $names = $records["Category_id"]; // Using global variable Post to access data sent via Post method
                    $image = $records["Category_Image"];
                    $name =  $records["Category_Name"];
                    $description = $records["Category_Description"];
                    $alt = $records["Alt"];
                    $href = $records["href"];
                        
                    echo "<td>";
                    echo "<a href=\"#\" title=\"\" class=\"tool\">";
                    echo "<img sr\"\" alt=\"\" width=\"450\" height=\"380\">";
                    echo "</a>";
                    echo "</td>";

                    $index = $index + 1;

                    }

                }
    
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