<?php
require 'database.php';

$page = htmlspecialchars(addslashes($_GET['page'] ?? 1));

finedbook();

if (count($_POST) > 0) {
    addUser();
}

function finedbook(): void
{
    global $db;
    global $page;
    
    $perpage=3;
    
    $from=$page * $perpage - $perpage;

    $result = mysqli_query($db, "SELECT * FROM books LIMIT $from,$perpage");
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
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Пользователи</title>
</head>
<body>

    <form method="get">

            <p><input type="number" name="page" placeholder="Введите номер страницы"> <input type="submit" value="Искать"></p>
        
            <p><a href="allregpage.php?page=<?=$page + 1 - $page; ?>">Начало</a></p>
            <p><a href="allregpage.php?page=<?=$page + 1; ?>">Вперёд</a></p>
            <p><a href="allregpage.php?page=<?=$page - 1; ?>">Назад</a></p>
    
    </form>
</body>
</html>