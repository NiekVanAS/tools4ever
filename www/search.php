<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
</head>

<body>
    <form action="" method="GET">
        <div>
            <label for="search">Search:</label>
            <input type="text" id="search" name="search" required>
            <button type="submit" name="submit">Search</button>
        </div>
    </form>

    <?php
    require "database.php";
    if (!isset($_GET['submit'])) {
        echo "klik op de knop om te zoeken";
        exit;
    }
    if (!isset($_GET['search'])) {
        echo "insert search in";
        exit;
    }

    if (empty($_GET['search'])) {
        echo "search is empty";
        exit;
    }
    $search = $_GET['search'];
    if (strlen($search) < 3) {
        echo "search moet minimaal 3 letters bevatten";
        exit;
    }
    $search = trim($search);


    $sql = "SELECT * FROM tools WHERE tool_name LIKE '%$search%'";
    // $sql = "SELECT * FROM tools WHERE tool_name = '$search'";

    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    ?>

    <?php if (!isset($data)) {
        exit;
    }
    echo "Results for :" . $search;
    foreach ($data as $data): ?>
        <div>
            <h2><?php echo $data['tool_name']; ?></h2>
            <p><?php echo $data['tool_category']; ?></p>
            <p><?php echo $data['tool_price']; ?></p>
            <p><?php echo $data['tool_brand']; ?></p>
        </div>
    <?php endforeach; ?>

</body>

</html>