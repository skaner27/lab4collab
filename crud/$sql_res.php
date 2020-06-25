<?php
try
{
    $sql = "SELECT id, login, password, role, name, surname, ip FROM users WHERE login= '$login' AND password='$password'";
    $result = $pdo->query($sql);
    $row = $result->fetch();

}
catch (PDOException $e)
{
    $output = 'Ошибка при выполнении обновления: ' . $e->getMessage();
    echo $output;
    exit();
}
