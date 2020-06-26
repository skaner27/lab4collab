<?
session_start();
include_once ("../lang/lang.".$_SESSION['NowLang'].".php");

?>
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
require_once 'getip.php';
$ip = $real_ip;
$login = $_SESSION['login'];
$password = $_SESSION['pass'];
require_once '../connect.php';

if(isset($_GET['del_tab_us'])){
    $id = ($_GET['del_tab_us']);

    $sql_del = "DELETE  FROM `users` WHERE `id` = :id";
    $result_del = $pdo->prepare($sql_del);
    $result_del->bindParam(':id', $id, PDO::PARAM_INT);
    $result_del->execute();
}

require_once '$sql_res.php';
try{

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
        $sql_search = "SELECT * FROM `users`";
        $result_search = $pdo->prepare($sql_search);
        $result_search->execute();
        while ($row_search = $result_search->fetch()) {
            echo "<tr>";
            echo "<td>" . $row_search['id'] . "</td>";
            echo "<td>" . $row_search['name'] . "</td>";
            echo "<td>" . $row_search['surname'] . "</td>";
            echo "<td>" . $row_search['login'] . "</td>";
            echo "<td>" . $row_search['password'] . "</td>";
            echo "<td>" . $row_search['lang'] . "</td>";
            echo "<td>" . $row_search['role'] . "</td>";
            if ($row['role'] == 'admin') {
                echo '<td>' . '<a href="editlist.php">' . $Lang['edit'] . '</a>';
                echo '</td>'; ?>
                <td><a href="crud.php?del_tab_us=<?= $row_search['id'] ?>>"><? echo $Lang['dell'] ?></a></td> <?php
            }
            echo '</tr>';
        }
        echo '</table>';
        echo '<br><center>
    <a href = "search.php">
        <button type="button" class="btn btn-outline-dark">'. $Lang['search'].'</button></center></a>

<br><center>
    <a href = "destroy_session.php">
        <button type="button" class="btn btn-outline-dark">'. 'Destroy'.'</button></center></a>
<br><center>
        <a href = "getip.php">
        <button type="button" class="btn btn-outline-dark">'. 'getip'.'</button></center></a>';


    }else{
        include '../error404.php';
    }

}
catch (PDOException $e)
{
    $output = 'Ошибка при выполнении обновления: ' . $e->getMessage();
    exit();
}

?>
