
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
    <form action="registration_procces.php" method="post">
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>

        <div>
            <label for="firstname">First name</label>
            <input type="text" name="firstname" id="firstname">

            <label for="lastname">Last name</label>
            <input type="text" name="lastname" id="lastname">

        </div>
        <div>
            <label for="adress">Adress</label>
            <input type="text" name="adress" id="adress">
        </div>
        <div>
            <label for="city">City</label>
            <input type="text" name="city" id="city">
        </div>
        <div>
            <label for="is_active">Actief</label>
            <input type="radio" name="status" id="is_active" value="1">

            <label for="is_not_active">Niet Actief</label>
            <input type="radio" name="status" id="is_not_active" value="0">
        </div>
        <div>
            <label for="role">Role</label>
            <select name="role" id="role">
                <option value="customer">Klant</option>
                <option value="employee">Employee</option>
                <option value="administrator">Admin</option>
            </select>
        </div>


        <div>
            <label for="font">font</label>
            <input type="text" name="font" id="font">

            <label for="backgroundColor">Achtergrond kleur</label>
            <input type="text" name="backgroundColor" id="backgroundColor">
        </div>
        <div>
            <button type="submit" name="submit">Regustreer</button>
        </div>
    </form>
</body>

</html>
