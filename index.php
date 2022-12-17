<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <?php
        include 'config.php'; // importing config page, to use its properties
        $connect = OpenConnection(); // calling the function to make a connection to the databse


    

        $query = "SELECT * FROM Category";  

        $results = mysqli_query($connect, $query) or die("Unable to retrieve data!");// Execute query using specified connection 

        $records = mysqli_fetch_array($results);// Turn result into an array 

        $names = $records["Category_Image"]; // Using global variable Post to access data sent via Post method

        echo "<img src='$names' alt=\"Laptop\"/>";
    
    
    ?>
</body>
</html>