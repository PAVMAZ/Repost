<?php
require 'database.php';

finedbook();

if (count($_POST) > 0) {
    addUser();
}

function finedbook(): array
{
    global $db;

    $result = mysqli_query($db, "SELECT * FROM books");
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $arr = mysqli_fetch_assoc($result);
        
        $name = $arr['name'];
        $authors_id = $arr['authors_id'];
        
        $result1 = mysqli_query($db, "SELECT * FROM authors WHERE id = $authors_id");
        $arr2 = mysqli_fetch_assoc($result1);
        $author_name = $arr2['surname'];
        
        echo '<li>' . $name . ' ' . $author_name . '</li>';
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
    <title>Пользователи</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>Книга</td>
            <td>Автор</td>
            <td>Год</td>
        </tr>

    </table>

    <form method="post" style="margin-top: 50px;">
        <fieldset>
            <p><input type="text" name="name" placeholder="Введите название книги"></p>
            <p><input type="text" name="surname" placeholder="Введите название автора"></p>
            <p><input type="date" name="birth" placeholder="Введите Год"></p>
            <p><input type="submit" value="Искать"></p>
        </fieldset>
    </form>
</body>
</html>

