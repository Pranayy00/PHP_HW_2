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
        Salary:
        <input type="number" name="sal" id="">
        <button type="submit">Submit</button>
    </form>
    <?php
include("db.php");
if ($_SERVER["REQUEST_METHOD"]==="POST") {
$name=$_POST["name"];
    $sal=$_POST['sal'];

$sql=$conn->prepare("update Emp set salary=? where name=?");
$sql->bind_param("ds",$sal,$name);
if ($sql->execute()) {
   echo "Db updated";
}
else {
    echo "Not Updated";
}
}
?>
</body>
</html>