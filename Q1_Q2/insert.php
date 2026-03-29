<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cinematic Form</title>

<style>
/* ===== Background ===== */
body {
    margin: 0;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Poppins', sans-serif;
    
    /* Cinematic gradient */
    background: linear-gradient(135deg, #1e3c72, #2a5298, #000);
    background-size: 400% 400%;
    animation: gradientMove 10s ease infinite;
}

/* Gradient animation */
@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* ===== Glass Form ===== */
form {
    padding: 30px;
    width: 320px;
    
    /* Glass effect */
    background: rgba(255, 255, 255, 0.08);
    border-radius: 20px;
    backdrop-filter: blur(15px);
    box-shadow: 0 8px 32px rgba(0,0,0,0.5);
    
    /* Animation */
    animation: fadeIn 1.2s ease;
}

/* Fade animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ===== Inputs ===== */
form input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
    
    border: none;
    outline: none;
    border-radius: 10px;
    
    background: rgba(255,255,255,0.15);
    color: white;
    
    transition: 0.3s;
}

/* Input focus glow */
form input:focus {
    background: rgba(255,255,255,0.25);
    box-shadow: 0 0 10px #00c6ff;
}

/* Labels */
form {
    color: white;
    font-weight: 500;
}

/* ===== Button ===== */
button {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 10px;
    
    background: linear-gradient(45deg, #00c6ff, #0072ff);
    color: white;
    font-size: 16px;
    
    cursor: pointer;
    transition: 0.3s;
}

/* Button hover */
button:hover {
    transform: scale(1.05);
    box-shadow: 0 0 15px #00c6ff;
}
</style>

</head>

<body>

<form action="" method="post">
    Name:
    <input type="text" name="name">

    Job title:
    <input type="text" name="job">

    Salary:
    <input type="number" name="sal">

    <button type="submit">Submit</button>
</form>

</body>
</html>
<?php
include "db.php";
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $name=$_POST['name'];
    $job=$_POST['job'];
    $sal=$_POST['sal'];
    $sql=$conn->prepare("insert into Emp values(?,?,?)");
    $sql->bind_param('ssd',$name,$job,$sal);
    if ($sql->execute()) {
         header("Location: " . $_SERVER["PHP_SELF"]);
        exit();

        
    }
    else{
        echo "Data not inserted";
    }
}
?>