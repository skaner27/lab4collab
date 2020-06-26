<?php
session_start();


    include_once ("lang/lang.".$_SESSION['NowLang'].".php");
    include "roles/includes.php";
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = $_POST['password'];
    $_SESSION['login'] = $login;
    $_SESSION['pass'] = $password;
    try
    {
         $sql = "SELECT id, login, password, role, name, surname FROM `users` WHERE `login`= :login AND `password`= :password";
         $result = $pdo->prepare($sql);
         $result->execute([':login'=>$login, 'password'=>$password]);
    }
    catch (PDOException $e)
    {
        header('Location: error404.php');
    }


    $user = $result->fetch();
    if ($user['login'] == true)
    {
        
          switch ($user['role']) {

                 case 'admin':
                 {
                     $admin = new Admin($user['name'], $user['surname']);
                     $admin->adminGreeting();
                     break;
                 }
                 case 'manager':
                 {
                     $manager = new Manager($user['name'], $user['surname']);
                     $manager->managerGreeting();
                     break;
                 }
                 case 'client':
                 {
                     $client = new Client($user['name'], $user['surname']);
                     $client->clientGreeting();
                     break;
                 }
             }

    }
    else
        {
        $_SESSION['msg'] = $Lang['error'];
        include "index.php";
        }


