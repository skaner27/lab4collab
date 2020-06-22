<?php
    session_start();

    include_once ("../lang/lang.".$_SESSION['NowLang'].".php");
    echo '<div class="upp">';
echo '<div class="alert alert-dark" role="alert">' . $Lang['role'].' : '. $_SESSION['user_role'] .'<br>';echo '</div>';
echo '<div class="alert alert-dark" role="alert">' . $Lang['name'].' : '. $_SESSION['user_name'] .'<br>';echo '</div>';
    echo '<div class="alert alert-dark" role="alert">' . $Lang['surname'].' : '. $_SESSION['user_surname'] .'<br>';echo '</div>';
echo '</div>';
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<body>
    <form action="settinglist.php" method="post" enctype="multipart/form-data">
        <table>
            <div class="head_block">
            <div class="form-group">
                <br>
                <label for="exampleInputEmail1"><label><? echo $Lang['name_tabl']?></label></label>
                <input type="text" name="user_name" value=" " class="form-control" >
            </div>

            <div class="form-group">
                <br>
                <label for="exampleInputEmail1"><label></label><? echo $Lang['surname_tabl']?></label></label>
                <input type="text" name="sur_name" value=" " class="form-control" >
            </div>

            <div class="form-group">
                <br>
                <label for="exampleInputEmail1"><label></label><? echo $Lang['login_lan']?></label></label>
                <input type="text" name="bad_login"  class="form-control" >
            </div>

            <div class="form-group">
                <br>
                <label for="exampleInputEmail1"><label></label><? echo $Lang['login_new']?></label></label>
                <input type="text" name="new_login"  class="form-control" >
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1"><label><? echo $Lang['pass_lan']?></label></label>
                <input type="password" name="bad_password" class="form-control">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1"><label><? echo $Lang['pass_new']?></label></label>
                <input type="password" name="new_password" class="form-control">
            </div>

            <div class="txtHint2"><a href = "settinglist.php">
                    <button type="button" class="btn btn-outline-dark"><? echo $Lang['button_lan']?></button></a></div>

                <?php
                if (isset($_SESSION['msg1'])) {
                    echo '<div>' . $_SESSION['msg1'] . '</div>';
                    unset($_SESSION['msg1']);
                }
                if ($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'manager') {
                    echo'  <div class="txtHint2"><a href = "crud.php">
    <button type="button" class="btn btn-outline-dark">'.  $Lang['come_back'].'</button></a></div>';
                }
                ?>
        </table>

    </form>
</body>
</html>
