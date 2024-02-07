<?php

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $first_name=$_POST["name"];
    $last_name=$_POST["fname"];
    $username=$_POST["username"];
    $email=$_POST["email"];
    $pwd=$_POST["password"];
    try{
require "dbh.inc.php";
function connect(){
    $mysqli=new msqli($dsn,$dbusername,$dbpassword);
    if($mysqli->connect_errno=!0){
        $error=$mysqli->connect_error;
        $error_date=date("F,j,Y, g:i a");
        $message="{$error}|{$error_date} \r\n";
        file_put_contents("db-log.txt",$message,FILE_APPEND);
        return false;
    }else{
        return $mysqli;
    }
}
function registerUser($first_name,$last_name,$username,$email,$pwd){
    $mysqli=connect();
$args=func_get_args();
$args=array_map(function($value){
    return trim($value);
},$args);

foreach($args as $value){
    if(preg_match("/([<|>])/",$value)){
        return"<>characters are not allowed";
    }
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    return "email is not valid";}

$stmt=$mysqli->prepare("SELECT email FROM users WHERE email = ?");
$stmt->bind_param("s",$email);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_assoc();
if($data !=NULL){
    return "email already exists";
}
 if(strlen($username)>50){
    return "username is too long";
 }
 $stmt=$mysqli->prepare("SELECT username FROM users WHERE username = ?");
$stmt->bind_param("s",$username);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_assoc();
if($data !=NULL){
    return "username already exists";
}
$hashed_password=password_hash($pwd,PASSWORD_DEFAULT);
$stmt=$mysqli->prepare("SELECT pwd FROM users WHERE pwd = ?");
$stmt->bind_param("s",$pwd);
$stmt->execute();
if($stmt->affected_rows!=1){
    return"an error occurred";

}else{
    return "success";
    $pdo=null;
    $stmt=null;
    header("Location:./index.html");
    die();
}
}
    
    }catch (mysqliException $e) {
        die ("Query failed: ".$e->getMessage());
    }
 }    else {
            header("Location:./index.html");
 }

