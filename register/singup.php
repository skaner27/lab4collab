<?php
session_start();
include_once ("../lang/lang.".$_SESSION['NowLang'].".php");
require_once "../connect.php";

$full_name = $_POST['name'];
$full_surname = $_POST['surname'];
$login = $_POST['login'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
try
{
    $sql = "SELECT * FROM `users` WHERE `login` = :login";
    $result = $pdo->prepare($sql);
    $result->execute([':login'=>$login]);
}
catch (PDOException $e)
{
    $output = 'Ошибка при выполнении обновления: ' . $e->getMessage();
    exit();
}
$user = $result->fetch();
require_once '../crud/getip.php';
$ip = $real_ip;
if($login == $user['login']){
    $_SESSION['msg2'] = $Lang['log_er'];
    header('Location: ../index.php');
}else
{
    if ($password == $password_confirm) {
        $sql_add = "INSERT INTO `users`(`id`, `name`, `surname`, `login`, `password`, `lang`, `role`, `ip`) VALUES  (NULL, :full_name,:full_surname,:login,:password,:ru,:client, :ip)";
        $result_add = $pdo->prepare($sql_add);
        $result->execute([':full_name'=>$full_name, ':full_surname'=>$full_surname,':login'=>$login,':password'=>$password,'ru'=>'ru',':client'=>'client', ':ip'=>$ip]);

        $_SESSION['msg2'] = $Lang['accept'];
        header('Location: ../index.php');
    } else {
        $_SESSION['msg2'] = $Lang['error'];
        header('Location: ../index.php');
    }
}


