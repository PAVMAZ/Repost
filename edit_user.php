<?php
require 'database.php';

$id = htmlspecialchars(addslashes($_GET['id']));
$user = [];

if (count($_POST) > 0) {
    updateUser();
}

getUserById();

function getUserById(): void
{
    global $id;
    global $db;
    global $user;

    if (!empty($id)) {
        $result = mysqli_query($db, "SELECT * FROM users WHERE id = " . $id);

        if (mysqli_num_rows($result) === 0) {
            die('Пользователь не найден');
        }

        $user = mysqli_fetch_assoc($result);
    } else {
        die('Не задан id пользователя');
    }
}

function updateUser(): void
{
    global $id;
    global $db;

    $name = htmlspecialchars(addslashes($_POST['name']));
    $surname = htmlspecialchars(addslashes($_POST['surname']));
    $birth = htmlspecialchars(addslashes($_POST['birth']));
    $phone = htmlspecialchars(addslashes($_POST['phone']));
    $email = htmlspecialchars(addslashes($_POST['email']));

    if (!empty($name) && !empty($surname) && !empty($birth) && !empty($phone) && !empty($email)) {
        $query = "UPDATE users SET name = '$name', surname = '$surname', birth = '$birth', phone = '$phone', email = '$email' WHERE id = " . $id;
        mysqli_query($db, $query);
    }
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактирование пользователя</title>
</head>
<body>
    <h1>Редактирование пользователя</h1>
    <form method="post" style="margin-top: 50px;">
        <fieldset>
            <p><input type="text" name="name" value="<?= $user['name']; ?>" placeholder="Введите имя"></p>
            <p><input type="text" name="surname" value="<?= $user['surname']; ?>" placeholder="Введите фамилию"></p>
            <p><input type="date" name="birth" value="<?= $user['birth']; ?>" placeholder="Введите дату рождения"></p>
            <p><input type="text" name="phone" value="<?= $user['phone']; ?>" placeholder="Введите телефон"></p>
            <p><input type="email" name="email" value="<?= $user['email']; ?>" placeholder="Введите email"></p>
            <p><input type="submit" value="Изменить"></p>
        </fieldset>
    </form>

    <a href="index.php">Вернуться назад</a>
</body>
</html>
