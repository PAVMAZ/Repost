<?php


$db = mysqli_connect('localhost', 'library', 'library123', 'library');
if (mysqli_connect_errno()) {
    die('ошибка подключения к базе данных');
} else {
    mysqli_query($db, "SET NAMES 'utf8'");
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

        <h1>Авторизация в библиотеке</h1>
    
        <form method="post">
        
            <p><input type="text" name="surname" placeholder="Введите логин"></p>
            <p><input type="text" name="name" placeholder="Введите пароль"></p>
            <p><input type="submit" value="Добавить"></p>

</form>
</body>
</html>