<?php
session_start();
include_once ("../lang/lang.".$_SESSION['NowLang'].".php");


?>

<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<meta charset="UTF-8">
<style>
    .head_block{
        margin: 0px auto;

        width: 500px;
        height: 500px;
    }
    .form-group {
        text-align: center;
    }
    .but{
        text-align: center;
    }
</style>
<body>

<form action="singup.php" method="post" enctype="multipart/form-data">
    <div class="head_block">
    <div class="form-group">
        <br>
        <label for="exampleInputEmail1"><label></label><? echo $Lang['name']?></label></label>
        <input type="text" name="name" class="form-control" >
    </div>

    <div class="form-group">
        <br>
        <label for="exampleInputEmail1"><label></label><? echo $Lang['surname']?></label></label>
        <input type="text" name="surname" class="form-control" >
    </div>

    <div class="form-group">
        <br>
        <label for="exampleInputEmail1"><label></label><? echo $Lang['login_lan']?></label></label>
        <input type="text" name="login" class="form-control" >
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1"><label><? echo $Lang['pass_lan']?></label></label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1"><label><? echo $Lang['pass_conf']?></label></label>
        <input type="password" name="password_confirm" class="form-control">
    </div>
    <div class="but">
        <button type="submit" class="btn btn-outline-dark"><? echo $Lang['button_lan']?></button>
    </div>

</form>
</body>
</html>
