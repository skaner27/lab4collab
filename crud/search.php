
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<meta charset="UTF-8">
<style>
   form{

       width: 9%;
        height: 50px;
        margin: 0px auto;
    }
    #txtHint{
        text-align: center;
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
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}


</script>

</head>
<body>

<form>
<select name="users" onchange="showUser(this.value)">
    <?
    session_start();
    include_once ("../lang/lang.".$_SESSION['NowLang'].".php");
    require_once '../connect.php';

    mysqli_select_db($connect,"ajax_demo");
    $sql="SELECT * FROM `users`";
    $result = mysqli_query($connect,$sql);

echo '<div class = head>';
    echo '<option value="" class= "" >' . $Lang['select']. '</option>';
    while($row = mysqli_fetch_array($result)) {
        echo '<option value="'. $row['id'].'"class="btn-outline-dark"">'.$row['name'] ." " .$row['surname'].'</option>';
    }
    var_dump($row['id']);
 echo '</div>';
    ?>

  </select>
</form>
<br>
<div id="txtHint"><b><?echo $Lang['her']?></b></div><br>
<div class="txtHint2"><a href = "crud.php">
    <button type="button" class="btn btn-outline-dark"><? echo $Lang['come_back']?></button></a></div>
</body>
</html>
