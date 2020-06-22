<?php
session_start();
include_once ("../lang/lang.".$_SESSION['NowLang'].".php");
require_once '../connect.php';
    // Формируем запрос из таблицы с именем blog
    $sql = "SELECT * FROM `users`";
    $result = $connect->query($sql);
    // В цикле перебираем все записи таблицы и выводим их

if(isset($_GET['del'])){
    $id = ($_GET['del']);

    mysqli_query($connect, "DELETE FROM `users` WHERE `users`.`id` = '$id'") or die( mysqli_error($connect));
}

    echo "<table border = 1>" .
    "<th>" . "ID" . "</th>" .
    "<th>" . $Lang['name_tabl'] . "</th>" .
    "<th>" . $Lang['surname_tabl'] . "</th>" .
    "<th>" . $Lang['login_lan'] . "</th>" .
    "<th>" . $Lang['pass_lan'] . "</th>" .
    "<th>" . $Lang['lang_tabl'] . "</th>" .
    "<th>" . $Lang['role_tabl'] . "</th>";


    while ($row = $result->fetch_assoc())
    {


        echo '<tr>';
        echo '<td>'; echo $row['id']. ' '; echo '</td>';
        echo '<td>'; echo $row['name']. ' '; echo '</td>';
        echo '<td>'; echo $row['surname']. ' ';echo '</td>';
        echo '<td>'; echo $row['login']. ' '; echo '</td>';
        echo '<td>'; echo $row['password']. ' '; echo '</td>';
        echo '<td>'; echo $row['lang']. ' '; echo '</td>';
        echo '<td>'; echo $row['role']. ' '; echo '</td>';
        if($_SESSION['user_role'] == 'admin') {
            echo '<td>' . '<a href="editlist.php">'. $Lang['edit']. '</a>';
            echo '</td>'; ?>
            <td><a href="crud.php?del=<?= $row['id'] ?>>"><? echo $Lang['dell']?></a></td> <?php
        }echo '</tr>';
    }
    echo '</table>';
    ?>
<br>
<a href="search.php"><? echo $Lang['search'] ?></a>
