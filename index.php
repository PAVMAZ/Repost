<?php
require 'database.php';

if (count($_POST) > 0) {
    addUser();
}

function addUser()
{

}

function getUsers(): array
{
    global $db;
    $users = [];

    $result = mysqli_query($db, "SELECT * FROM users");
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $users[] = mysqli_fetch_assoc($result);
    }

    return $users;
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Пользователи</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>Имя</td>
            <td>Фамилия</td>
            <td>Дата рождения</td>
            <td>Телефон</td>
            <td>Email</td>
            <td>Редактировать</td>
        </tr>
        <?php if (count(getUsers()) === 0) { ?>
            <tr>
                <td colspan="6">Пользователи не найдены</td>
            </tr>
        <?php } else { foreach ($users = getUsers() as $user) { ?>
            <tr>
                <td><?= $user['name']; ?></td>
                <td><?= $user['surname']; ?></td>
                <td><?= $user['birth']; ?></td>
                <td><?= $user['phone']; ?></td>
                <td><?= $user['email']; ?></td>
                <td>
                    <a href="edit_user.php?id=<?= $user['id']; ?>">Редактировать</a> /
                    <a href="delete_user.php?id=<?= $user['id']; ?>">Удалить</a>
                </td>
            </tr>
        <?php } } ?>
    </table>

    <form method="post" style="margin-top: 50px;">
        <fieldset>
            <p><input type="text" name="name" placeholder="Введите имя"></p>
            <p><input type="text" name="surname" placeholder="Введите фамилию"></p>
            <p><input type="date" name="birth" placeholder="Введите дату рождения"></p>
            <p><input type="text" name="name" placeholder="Введите телефон"></p>
            <p><input type="email" name="name" placeholder="Введите email"></p>
            <p><input type="password" name="name" placeholder="Введите пароль"></p>
            <p><input type="submit" value="Добавить"></p>
        </fieldset>
    </form>
</body>
</html>

