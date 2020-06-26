<?php
session_start();
include_once ("../lang/lang.".$_SESSION['NowLang'].".php");
require_once '../connect.php';?>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<meta charset="UTF-8">
<style>
   form{

       width: 8%;
        height: 50px;
        margin: 0px auto;
    }
    #txtHint{
        text-align: center;
        width: 900px;
        margin: 0px auto;

    }
    .txtHint2{
        text-align: center;
    }

</style>
<head>
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getuser.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>

</head>
<body>

<form>

    <?
    require_once 'getip.php';
    $login = $_SESSION['login'];
    $password = $_SESSION['pass'];
    $ip = $real_ip;
    require_once '$sql_res.php';
    try {
        if($row['ip'] == $ip && $row['role'] === 'admin' || $row['ip'] == $ip && $row['role'] === 'manager') {
    $sql_tab="SELECT * FROM `users`";
    $result_tab = $pdo->prepare($sql_tab);
    $result_tab->execute();
    echo '<select name="users" onchange="showUser(this.value)">';
echo '<div class = head>';
echo $Lang['select'];
    echo '<option value="" class= "" >' . $Lang['select']. '</option>';
    while($row_tab = $result_tab->fetch()) {
        echo '<option value="'. $row_tab['id'].'"class="btn-outline-dark"">'.$row_tab['name'] ." " .$row_tab['surname'].'</option>';
    }
    var_dump($row_tab['id']);
 echo '</div>';
    ?>

  </select>
</form>
<br>
<div id="txtHint"><b><? echo $Lang['her'] ?></b></div><br>
<div class="txtHint2"><a href = "crud.php">
    <button type="button" class="btn btn-outline-dark"><?echo $Lang['come_back']?></button></a></div>
</body>
</html>
<?php } else{
            include '../error404.php';
        }

        }catch (PDOException $e)
    {
        $output = 'Ошибка при выполнении обновления: ' . $e->getMessage();
        header('Location: ../error404.php');
        exit();
    } ?>