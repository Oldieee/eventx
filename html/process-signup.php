<?php
if(empty($_POST["first_name"])){
    die("first-name is required");
}
if(empty($_POST["last_name"])){
    die("last-name is required");
}
if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
    die("valid email is required");
}
if(strlen($_POST['password'])<8){
    die('Password must cointain at least 8 characters');
}
if(!preg_match("/[a-z]/i",$_POST['password'])){
    die('password must contain at least one letter');
}
if(!preg_match("/[1-9]/i",$_POST['password'])){
    die('password must contain at least one number');
}
$password_hash=password_hash($_POST['password'],PASSWORD_DEFAULT);
$mysqli=require __DIR__."/database.php";

$sql="INSERT INTO user (first_name,last_name,username,email,password_hash) VALUES (?,?,?,?,?)";
$stmt=$mysqli->stmt_init();
if(!$stmt->prepare($sql)){
die('sql error:'.$mysqli->error);
}
$stmt->bind_param('sssss',
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['username'],
            $_POST['email'],
            $password_hash);
if($stmt->execute()){
    header('Location: signup-success.html');

}else{
    if($mysqli->errno===1062){
        die("email already taken");
    }else{
        die($mysqli->error."".$mysqli->errro);
    }
}






