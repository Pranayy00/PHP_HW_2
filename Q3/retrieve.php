<?php
include '../Q1_Q2/db.php';
$result=$conn->query("select * from employees");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      </head>
<body>
    <table border="1" cellspacing="0" cellpadding="10"  style="border:2px solid; margin:auto;" >
        <tr  >
        <th>ID</th>
        <th>Name</th>
        <th>Position</th>
        <th>Salary</th>
        </tr>
        <?php
        while ($row=$result->fetch_assoc()) {?>
       <tr>
        <td><?php echo $row["id"]?> </td>
        <td><?php echo $row["name"]?> </td>
        <td><?php echo $row["position"]?> </td>
        <td><?php echo $row["salary"]?> </td>
<?php }?>
       </tr>
    </table>
</body>
</html>