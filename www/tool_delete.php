<?php
session_start();

if (!isset($_SESSION['email'])) {
    echo "Je mag hier niet zijn";
    exit;
}

require 'database.php';

$id = $_GET['id'];

$sql = "DELETE FROM tools WHERE 'tool_id' = $id";

mysqli_query($conn, $sql);

header("location: tools_index.php")

?>