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
<body>

<?php
$q = intval($_GET['q']);
require_once '../connect.php';

mysqli_select_db($connect,"ajax_demo");
$sql="SELECT * FROM `users` WHERE id = '$q'";
$result = mysqli_query($connect,$sql);

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

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['surname'] . "</td>";
  echo "<td>" . $row['login'] . "</td>";
  echo "<td>" . $row['password'] . "</td>";
  echo "<td>" . $row['lang'] . "</td>";
  echo "<td>" . $row['role'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($connect);
?>
</body>
</html>
