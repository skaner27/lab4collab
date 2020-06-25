<?php
    session_start();

    include_once ("../lang/lang.".$_SESSION['NowLang'].".php");
    echo '<div class="upp">';
echo '<div class="alert alert-dark" role="alert">' . $Lang['role'].' : '. $_SESSION['user_role'] .'<br>';echo '</div>';
echo '<div class="alert alert-dark" role="alert">' . $Lang['name'].' : '. $_SESSION['user_name'] .'<br>';echo '</div>';
    echo '<div class="alert alert-dark" role="alert">' . $Lang['surname'].' : '. $_SESSION['user_surname'] .'<br>';echo '</div>';
?>
<html>
<style>
    .upp{
        margin: 0px auto;
        width: 500px;
        text-align: center;
    }
    .head_block{
        margin: 0px auto;

        width: 500px;
        height: 500px;
    }
    .form-group {
        text-align: center;
    }
    .btn{
        text-align: center;
    }
    .txtHint2{
        text-align: center;

    }


</style>
<Link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<body>

<form action="settinglist.php" method="post" enctype="multipart/form-data" class="head_block">

    <label><? echo $Lang['name']?></label><br>
    <input type="login" name="user_name" class="form-control"> <br>

    <label><? echo $Lang['surname']?></label><br>
    <input type="login" name="sur_name" class="form-control"> <br>

    <label><? echo $Lang['login_lan']?></label><br>
    <input type="login" name="bad_login" class="form-control"> <br>

    <label><? echo $Lang['login_new']?></label><br>
    <input type="login" name="new_login" class="form-control"> <br>

    <label><? echo $Lang['pass_lan']?></label><br>
    <input type="password" name="bad_password" class="form-control"> <br>

    <label><? echo $Lang['pass_new']?></label><br>
    <input type="password" name="new_password" class="form-control"> <br>

    <button type="submit"><? echo $Lang['button_lan']?></button>
    <?php
    if (isset($_SESSION['msg12'])) {
        echo '<div>' . $_SESSION['msg12'] . '</div>';
        unset($_SESSION['msg12']);
    }
    ?>
</form>
</body>
</html>
