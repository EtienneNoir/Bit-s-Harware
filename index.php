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
        $dbhost = "bqb6bmikgqu0mnc0iiyq-mysql.services.clever-cloud.com";
        $dbuser = "uwge0zlmihcmhulr";
        $dbpass = "2WVoKwXz4jFu57oNdrZn";
        $db = "bqb6bmikgqu0mnc0iiyq";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Failed to connect to database". $conn -> error);

      // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
    ?>
</body>
</html>