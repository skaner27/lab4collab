<?session_start();?>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<meta charset="UTF-8">
<style>
    .table{
        margin: 0px auto;
        width: 900px;
        border: 1px solid black;

    }

</style>
</html>

<?php

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

    echo "<table class= 'table table-dark'>";
        echo '<thead>';
    echo '<tr>'.
    "<th scope='col'>" . "ID" . "</th>" .
    "<th scope='col'>" . $Lang['name_tabl'] . "</th>" .
    "<th scope='col'>" . $Lang['surname_tabl'] . "</th>" .
    "<th scope='col'>" . $Lang['login_lan'] . "</th>" .
    "<th scope='col'>" . $Lang['pass_lan'] . "</th>" .
    "<th scope='col'>" . $Lang['lang_tabl'] . "</th>" .
    "<th scope='col'>" . $Lang['role_tabl'] . "</th>";
echo '<tr>';
echo '</thead>';

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
<br><center>
    <a href = "search.php">
        <button type="button" class="btn btn-outline-dark"><? echo $Lang['search']?></button></center></a>


