<?php
require 'database.php';

$id = htmlspecialchars(addslashes($_GET['id']));

if (!empty($id)) {
    mysqli_query($db, "DELETE FROM users WHERE id = " . $id);

    header('Location: index.php');
} else {
    die('id пользователя не получен');
}