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
        $connect = OpenConnection(); // calling the function and storing its return value

        echo $connect; 
    ?>
</body>
</html>