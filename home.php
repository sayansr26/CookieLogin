<?php 

require('function.php');

if(login()){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome User</h1>
    <a href="logout.php">Logout</a>
</body>
</html>

<?php }else{
    header('location:index.php');
} ?>


