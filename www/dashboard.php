<?php
//Check of gebruiker ingelogt is

use LDAP\Result;

use function PHPSTORM_META\sql_injection_subst;

session_start();

if (!isset($_SESSION['email'])) {
    header("location: login.php");
    exit;
}

$user_id = $_SESSION['id'];

require 'database.php';

$sql = "SELECT COUNT(*) AS aantal_tools FROM tools";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

$sql = "SELECT ROUND(AVG(tool_price / 100),2) FROM tools";
$result = mysqli_query($conn, $sql);
$avaragePrice = mysqli_fetch_assoc($result);

$sql = "SELECT ROUND(AVG(tool_price / 100),2), tool_category FROM tools GROUP BY tool_category";
$result = mysqli_query($conn, $sql);
$averagePricePerTool = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT ROUND(MAX(tool_price / 100),2) FROM tools";
$result = mysqli_query($conn, $sql);
$highestPrice = mysqli_fetch_assoc($result);

$sql = "SELECT firstname FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

$sql = "SELECT font, backgroundColor FROM `users` JOIN user_settings ON user_settings.user_id = users.id WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
$personalisation = mysqli_fetch_assoc($result); 

// exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<style>
    body{
        background-color: <?php echo['backgroundColor']?>;
    }
</style>

<body>
    <?php include "nav.php"; ?>
    <section>
        <p>ingelogt als: <?php echo $user['firstname']?></p>
        <p>Font: <?php echo $personalisation['font']?></p> 
        <p>background color: <?php echo $personalisation['backgroundColor']?></p> 
        <h1>
            data van database
        </h1>
        <p>
        <div>
            <span>aantal gereedschap: <?php echo $data['aantal_tools'] ?></span>
        </div>
        <div>
            <span>gemiddelde prijs: <?php echo $avaragePrice['ROUND(AVG(tool_price / 100),2)'] ?></span>
        </div>
        <div>
            <span>hoogste prijs: <?php echo $highestPrice['ROUND(MAX(tool_price / 100),2)'] ?></span>
        </div>
        <tbody>
            <?php foreach ($averagePricePerTool as $tools) : ?>
                <div>
                    <p>gemiddlde prijs <?php echo $tools['tool_category'] ?>: <?php echo $tools['ROUND(AVG(tool_price / 100),2)'] ?></p>
                </div>
            <?php endforeach; ?>
        </tbody>


        </p>
</body>

</HTML>