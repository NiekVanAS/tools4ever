<?php

require 'database.php';

$id = $_GET['id'];

$sql = "SELECT * FROM tools WHERE tool_id = $id";

$result = mysqli_query($conn, $sql);

$tools = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Document</title>

</head>

<body>
    <?php include "nav.php"; ?>
    <td>
    <td><?php echo $tools['tool_name']; ?></td>
    <td><?php echo $tools['tool_price']; ?></td>
    <td><?php echo $tools['tool_category']; ?></td>
    <td><?php echo $tools['tool_brand']; ?></td>

    <img src="images/<?php echo $tools['tool_name']; ?>.jpg" alt="driver-image">
    </h2>

</body>

</html>