<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Id:
        <input type="number" name="id" id=""><br><br>
        Name:
        <input type="text" name="name"><br><br>
        Position:
        <input type="text" name="position" id=""><br><br>
        Salary:
        <input type="number" name="sal" id=""><br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
<?php
include "../Q1_Q2/db.php";
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $pos=$_POST['position'];
    $sal=$_POST['sal'];
    $sql=$conn->prepare("insert into Employees values(?,?,?,?)");
    $sql->bind_param('issd',$id,$name,$pos,$sal);
    if ($sql->execute()) {
         header("Location: " . $_SERVER["PHP_SELF"]);
        exit();
    }
    else{
        echo "Data not inserted";
    }
}
?>