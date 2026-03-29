<?php
include 'db.php';
$result=$conn->query("select * from Emp");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script> -->
</head>
<body>
    <table border="1" cellspacing="0" cellpadding="10"  style="border:2px solid; margin:auto;" >
        <tr  >
            <th>Name</th>
            <th>Job_title</th>
            <th>Salary</th>
        </tr>
        <?php
        while ($row=$result->fetch_assoc()) {?>
       <tr>
        <td><?php echo $row["name"]?> </td>
                <td><?php echo $row["job_title"]?> </td>
        <td><?php echo $row["salary"]?> </td>
<?php }?>
       </tr>
    </table>
</body>
</html>