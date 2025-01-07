<?php

session_start();

require "database.php";

$sql = "SELECT * FROM tools";

$result = mysqli_query($conn, $sql);

$tools = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (empty($tools)) {
    echo "Geen data";
    exit;
}
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
    <table>
        <thead>
            <tr>
                <th>Tool ID</th>
                <th>Naam</th>
                <th>Prijs (cent)</th>
                <th>Catagorie</th>
                <th>Merk</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($tools as $tools) : ?>
                <tr>
                    <td><?php echo $tools['tool_id']; ?></td>
                    <td><?php echo $tools['tool_name']; ?></td>
                    <td><?php echo number_format($tools['tool_price']); ?></td>
                    <td><?php echo $tools['tool_category']; ?></td>
                    <td><?php echo $tools['tool_brand']; ?></td>
                    <td>
                        <a href="detail.php?id=<?php echo $tools['tool_id'] ?>">Details</a>
                        <a href="tool_delete.php?id=<?php echo $tools['tool_id'] ?>" class="delete">Verwijder</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>