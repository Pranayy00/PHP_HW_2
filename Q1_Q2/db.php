<?php
$servername='localhost';
$usernamae='root';
$password='';
$dbname='j2_php';
$conn=new mysqli($servername,$usernamae,$password,$dbname);
if (!$conn) {
    echo "Db not connected";
}

?>