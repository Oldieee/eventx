<?php
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $first_name=$_POST["name"];
    $last_name=$_POST["fname"];
    $username=$_POST["username"];
    $email=$_POST["email"];
    $pwd=$_POST["password"];

    try {
       require_once "dbh.inc.php";
       $query="DELETE FROM users WHERE first_name=:username AND pwd=:pwd";
         $stmt=$pdo->prepare($query);
         $stmt->bindParam(":first_name",$first_name);
         $stmt->bindParam(":last_name",$last_name);
         $stmt->bindParam(":username",$username);
         $stmt->bindParam(":email",$email);
         $stmt->bindParam(":pwd",$pwd);
         $stmt->execute();
         $pdo=null;
         $stmt=null;
         header("Location: ./index.php");
         die();

    }catch(PDOException $e){
        die ("Query failed: ".$e->getMessage());
    }
 }    else {
            header("Location:.  /index.html");
 }