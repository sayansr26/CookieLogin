<?php 

//  database connection with pdo

$connect = new PDO('mysql:host=localhost;dbname=login_db','root','');
$username = $_POST['username'];
$password = $_POST['password'];
$passwordmd5 = md5($password);
if($username==''){
    echo "empty_username";
}elseif($password==''){
    echo "empty_password";
}else{
    $query = "SELECT * FROM user_info WHERE username = :username";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            'username' => $_POST['username']
        )
    );
    $count = $statement->rowCount();
    if($count > 0){
        $result = $statement->fetchAll();
        foreach($result as $row){
            if($passwordmd5==$row['password']){
                setcookie('username',$row['username'],time()+3600);
                echo "success";
            }else{
                echo "password_error";
            }
        }
    }else{
        echo "username_error";
    }
}

?>