<?php
@session_start();

class Admin  extends User
{
    public function adminGreeting()
    {

        if($_SESSION['NowLang'] == "ru") {
            echo '<div class="alert alert-dark" role="alert" >' .
                'Здравствуйте, Админ ' .   $this->name   . ' ' . $this->surname . ' . Вы можете на сайте изменять, удалять и создавать клиентов.' .
            '</div>';
echo '<div class="btn1">' . '<a href = "../crud/crud.php" methods="post">
        <br><button type="button" class="btn btn-outline-dark">' . 'Продолжить' . '</button>' . '</a>';
            echo '</div>';
        }
        elseif ($_SESSION['NowLang'] == "ua"){
            echo '<div class="alert alert-dark" role="alert" >' . "Вітаю, Адмін ". $this->name . " " . $this->surname . ". Ви можете на сайті змінювати, видаляти і створювати клієнтів.";echo '</div>';
            echo '<div class="btn1">' . '<a href = "../crud/crud.php" methods="post">
        <br><button type="button" class="btn btn-outline-dark">' . 'Продовжити' . '</button>' . '</a>';
            echo '</div>';
        }
        else{
            echo '<div class="alert alert-dark" role="alert">' . "Hello, Admin " . $this->name . " " . $this->surname . ". You can modify, delete and create clients on the site.";echo '</div>';
            echo'<div class="btn1">' . '<a href = "../crud/crud.php" methods="post">
        <br><button type="button" class="btn btn-outline-dark">' . 'Continue' . '</button>' . '</a>';echo '</div>';
        }
    }
}
?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title><?php echo $Lang['title']?></title>
    <style>
        .alert{
            text-align: center;
            margin: 0px auto;
            width: 900px;
        }
        .btn1{
            text-align: center;
        }
    </style>
</head>
</html>
