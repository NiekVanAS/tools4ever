<?php
require "database.php";

if (
    !isset($_POST['email']) ||
    !isset($_POST['password'])
) {
    echo "Vul de coorecte email en wachtwoord in";
    exit;
}
if (empty($_POST['email'])) {
    echo "Vul email in!";
    exit;
}
if (empty($_POST['password'])) {
    echo "Vull wachtwoord in!";
    exit;
}


$email = $_POST['email'];
$password = $_POST['password'];


$sql = "SELECT * FROM users WHERE email = '$email'";

$result = mysqli_query($conn, $sql);

$dbuser = mysqli_fetch_assoc($result);




if ($dbuser['password'] === $password) {
    session_start();

    $_SESSION['id'] = $dbuser['id'];
    $_SESSION['email'] = $dbuser['email'];
    

    header("location: index.php");
}