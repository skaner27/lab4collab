
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

    try
    {
        $sql = "SELECT id, login, password, role, name, surname FROM users WHERE login= :bad_login AND password= :bad_pass";
        $result = $pdo->prepare($sql);
        $result->execute([':bad_login'=>$bad_login, ':bad_pass'=>$bad_pass]);
        $row = $result->fetch();
        $id = $row['id'];

    }
    catch (PDOException $e)
    {
        $output = 'Ошибка при выполнении обновления: ' . $e->getMessage();
        exit();
    }
    try
    {
        if($bad_login == '' && $bad_pass == '' && $new_login == '' && $new_pass == '' && $user_name == '' && $sur_name == ''){

            $_SESSION['msg12'] = $Lang['error'];
            header('Location: ../editlist.php');

        }else {

            $sql = "UPDATE users SET name=?, surname=?, login=?, password=? WHERE id=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user_name, $sur_name, $new_login, $new_pass, $id]);

            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_surname'] = $sur_name;


            $_SESSION['msg12'] = $Lang['accept_edit'];
            header('Location: ../editlist.php');

            if ($_SESSION['user_role'] == 'admin') {
                header("Location: crud.php");
            } elseif ($_SESSION['user_role'] == 'manager') {
                header("Location: crud.php");
            } else {
                header("Location: editlist.php");
            }
        }

    }
    catch (PDOException $e)
    {
        $output = 'Ошибка при выполнении обновления: ' . $e->getMessage();
        exit();
    }
