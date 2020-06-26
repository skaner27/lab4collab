<?php
session_start();
include_once ("../lang/lang.".$_SESSION['NowLang'].".php");
?>
<!DOCTYPE html>
<html>
<head>
<style>
    .table{
        margin: 0px auto;
        width: 900px;
        border: 1px solid black;

    }


th {text-align: left;}
</style>
</head>
</html>
<?php
require_once 'getip.php';
$ip = $real_ip;
$login = $_SESSION['login'];
$password = $_SESSION['pass'];
$q = $_GET['q'];
require_once '../connect.php';
require_once '$sql_res.php';
try
{
    if($row['ip'] == $ip && $row['role'] === 'admin' || $row['ip'] == $ip && $row['role'] === 'manager') {

        echo "<table class= 'table table-dark'>";
        echo '<thead>';
        echo '<tr>' .
            "<th scope='col'>" . "ID" . "</th>" .
            "<th scope='col'>" . $Lang['name_tabl'] . "</th>" .
            "<th scope='col'>" . $Lang['surname_tabl'] . "</th>" .
            "<th scope='col'>" . $Lang['login_lan'] . "</th>" .
            "<th scope='col'>" . $Lang['pass_lan'] . "</th>" .
            "<th scope='col'>" . $Lang['lang_tabl'] . "</th>" .
            "<th scope='col'>" . $Lang['role_tabl'] . "</th>";
        echo '<tr>';
        echo '</thead>';
        $sql_search = "SELECT * FROM `users` WHERE id = '$q'";
        $result_search = $pdo->query($sql_search);
        while ($row_search = $result_search->fetch()) {
            echo "<tr>";
            echo "<td>" . $row_search['id'] . "</td>";
            echo "<td>" . $row_search['name'] . "</td>";
            echo "<td>" . $row_search['surname'] . "</td>";
            echo "<td>" . $row_search['login'] . "</td>";
            echo "<td>" . $row_search['password'] . "</td>";
            echo "<td>" . $row_search['lang'] . "</td>";
            echo "<td>" . $row_search['role'] . "</td>";
            echo "</tr>";

        }
        echo "</table>";
    }
    else{
        include '../error404.php';
    }
    }
    catch (PDOException $e)
    {
     $output = 'Ошибка при выполнении обновления: ' . $e->getMessage();
        exit();
    }

?>