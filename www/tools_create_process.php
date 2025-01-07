<!-- <pre>
<?php
var_dump($_POST);
?>
</pre> -->

<?php


if (!isset($_POST['submit'])) {
    var_dump($_POST);
    echo "druk op de knop";
    exit;
}

if (!isset($_POST['tool_name']) || !isset($_POST['tool_price']) || !isset($_POST['tool_category']) || !isset($_POST['tool_brand'])) {
    echo "vull alles in graag";
    var_dump($_POST);
    exit;
}
if (empty($_POST['tool_name'])) {
    echo "naam is verplicht";
    exit;
}

if (empty($_POST['tool_category'])) {
    echo "Catagorie is verplicht";
    exit;
}

if (empty($_POST['tool_price'])) {
    echo "Prijs is verplicht";
    exit;
}
if (empty($_POST['tool_brand'])) {
    echo "merk is verplicht";
    exit;
}
if(!is_numeric($_POST['tool_price'])){
    echo "Prijs moet in gehele getallen";
    exit;
}

$tool_name = $_POST['tool_name'];
$tool_catagory = $_POST['tool_category'];
$tool_price = $_POST['tool_price'];
$tool_brand = $_POST['tool_brand'];

require "database.php"; //$conn

$sql = "INSERT INTO tools (tool_name, tool_category, tool_price, tool_brand) 
        VALUES ('$tool_name', '$tool_catagory', '$tool_price', '$tool_brand')";

mysqli_query($conn, $sql);

if(mysqli_query($conn, $sql)){
    header("location: dashboard.php");
    exit;
}
echo "congrats";
?>
<pre>
<?php var_dump($_POST); ?>
</pre>