<?php
require 'const.php';


$conn=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if($conn->connect_error){
    die('Connection Error'.$conn->connect_error);
}