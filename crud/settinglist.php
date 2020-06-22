<?php
    session_start();
    include_once ("../lang/lang.".$_SESSION['NowLang'].".php");
    require_once '../connect.php';

    $bad_login = $_POST['bad_login'];
    $bad_pass = $_POST['bad_password'];
    $new_login = $_POST['new_login'];
    $new_pass = $_POST['new_password'];
    $user_name = $_POST['user_name'];
    $sur_name = $_POST['sur_name'];

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$bad_login' AND `password` = '$bad_pass'");
    if (mysqli_num_rows($check_user) > 0){
        $id = mysqli_fetch_assoc($check_user);
        $id_ = $id['id'];
        if($new_login == " "){}
        else{
            mysqli_query($connect, "UPDATE `users` SET `login` = '$new_login' WHERE `users`.`id` = '$id_'");
        }
        if($new_pass == " "){}
        else{
                mysqli_query($connect, "UPDATE `users` SET `password` = '$new_pass' WHERE `users`.`id` = '$id_'");
        }
        if($user_name == " "){}
        else{
            mysqli_query($connect, "UPDATE `users` SET `name` = '$user_name' WHERE `users`.`id` = '$id_'");
        }
        if($sur_name == " "){}
        else{
            mysqli_query($connect, "UPDATE `users` SET `surname` = '$sur_name' WHERE `users`.`id` = '$id_'");
        }

        if($_SESSION['user_role'] == 'admin') {
            header("Location: crud.php");
        }elseif($_SESSION['user_role'] == 'manager'){
            header("Location: crud.php");
        }else{
            header("Location: client_list.php");
        }

    }
    else{
        {

            $_SESSION['msg1'] = $Lang['error'];
            header("Location: editlist.php");
        }

    }

