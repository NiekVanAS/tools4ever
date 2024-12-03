    <pre>
        <?php var_dump($_POST) ?>
    </pre>

<?php


if (
    !isset($_POST['firstname']) ||
    !isset($_POST['lastname']) ||
    !isset($_POST['email']) ||
    !isset($_POST['password']) ||
    !isset($_POST['font']) ||
    !isset($_POST['backgroundColor'])

) {
    echo "is niet goed gevuld!";
    exit;
}
if (empty($_POST['email'])) {
    echo "De email is verplicht!";
    exit;
}
if (empty($_POST['password'])) {
    echo "Het wachtwoord is verplicht!";
    exit;
}
if (empty($_POST['firstname'])) {
    echo "Uw eerste naam is verplicht!";
    exit;
}
if (empty($_POST['lastname'])) {
    echo "Uw achternaam is verplicht!";
    exit;
}
if (empty($_POST['adress'])) {
    echo "Het adres is verplicht!";
    exit;
}
if (empty($_POST['city'])) {
    echo "De stad is verplicht!";
    exit;
}

$name = $_POST['firstname'];
$lastname = $_POST['lastname'];
$password = $_POST['password'];
$email = $_POST['email'];
$address = $_POST['adress'];
$city = $_POST['city'];
$status = $_POST['status'];
$role = $_POST['role'];
$font = $_POST['font'];
$backgroundColor = $_POST['backgroundColor'];

require "database.php"; //$conn

$sql = "INSERT INTO users (firstname, lastname, password, email, address, city, is_active, role) 
        VALUES ('$name', '$lastname', '$password', '$email', '$address', '$city', '$status', '$role')";

mysqli_query($conn, $sql);

$last_id = mysqli_insert_id($conn);

var_dump($last_id);

$sql = "INSERT INTO user_settings (user_id, font, backgroundColor) VALUES ('$last_id', '$font', '$backgroundColor')";
mysqli_query($conn, $sql);
?>