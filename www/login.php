<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <?php include "nav.php"; ?>
    <form action="login_register.php" method="post">
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Wachtwoord</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit" name="submit">Log in</button>


        <div>
            nog geena acount aan gemaakt? <a href="register.php">Register</a>
        </div>
</body>

</html>