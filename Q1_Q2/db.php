<?php
$servername='localhost';
$usernamae='root';
$password='';
$dbname='employee_db';
$conn=new mysqli($servername,$usernamae,$password,$dbname);
if (!$conn) {
    echo "Db not connected";
}

?>