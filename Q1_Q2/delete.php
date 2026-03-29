<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Name:
        <input type="text" name="name" id=""><br><br>
        <button type="submit">Submit</button>
</form>
</body>
</html>
<?php
include("db.php");
if ($_SERVER["REQUEST_METHOD"]==="POST") {
$name=$_POST["name"];
$sql=$conn->prepare("delete from emp where name=?");
$sql->bind_param("s",$name);
if ($sql->execute()) {
    echo "data deleted";
    exit();
}
else{
    echo "Db not deleted";
}
}