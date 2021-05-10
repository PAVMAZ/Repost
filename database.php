<?php
$db = mysqli_connect('localhost', 'library', 'library123', 'library');
if (mysqli_connect_errno()) {
    die('ошибка подключения к базе данных');
} else {
    mysqli_query($db, "SET NAMES 'utf8'");
}
