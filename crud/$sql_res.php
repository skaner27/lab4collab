<?php
try
{
    $sql = "SELECT id, login, password, role, name, surname, ip FROM `users` WHERE `login`= :login AND `password`= :password AND `ip` = :ip";
    $result = $pdo->prepare($sql);
    $result->execute([':login'=>$login, ':password'=>$password, ':ip'=>$ip]);
    $row = $result->fetch();

}
catch (PDOException $e)
{
    $output = 'Ошибка при выполнении обновления: ' . $e->getMessage();
    header('Location: ../error404.php');
    exit();
}

