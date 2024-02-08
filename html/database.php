<?php
$host="localhost";
$dbname="login_db";
$username="root";
$password="";

$mysqli=new mysqli($host,$username,$password,$dbname);
if ($mysqli->connect_errno){
    die('conn error: '.$mysqli->connect_error);

}
return $mysqli;