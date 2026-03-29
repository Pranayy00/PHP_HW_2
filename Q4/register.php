
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Employee Registration Form</h2>

<form method="post">
    Id: <input type="number" name="id" id="" ><br><br>
    Full Name: <input type="text" name="name" ><br><br>
    Email: <input type="text" name="email"><br><br>
    Password: <input type="password" name="pass"><br><br>
    Confirm Password: <input type="password" name="c_pass"> <br><br>
    Job Title: <input type="text" name="job_title"><br><br>

    <button type="submit">Submit</button>
</form>

</body>
</html>
<?php
include "../Q1_Q2/db.php";
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $id=$_POST["id"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $cpass=$_POST["c_pass"];
    $job_title=$_POST["job_title"];
    if (empty($name)||empty($email)||empty($pass)||empty($cpass)||empty($job_title)) {
       echo "<script>alert('Fields are empty');</script>";
    }
    elseif ($pass!=$cpass) {
        echo "<script>alert('Passwords do not match');</script>";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         echo "<script>alert('Invalid Email');</script>";

    }
    else {
    $check = $conn->prepare("select * from emp_register where email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email already exists');</script>";
    }

    else{
         $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = $conn->prepare("insert into emp_register values(?,?,?,?,?,?)");
        $sql->bind_param("isssss", $id, $name, $email, $hashed_pass, $hashed_pass, $job_title);

        if ($sql->execute()) {
            echo "<script>alert('Data inserted');</script>";
        } else {
            echo "<script>alert('Data not inserted');</script>";
        }
    }
    }
}
?>
