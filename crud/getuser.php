<?php
session_start();
include_once ("../lang/lang.".$_SESSION['NowLang'].".php");
?>
<!DOCTYPE html>
<html>
<head>
<style>

table, td, th {
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

echo "<table>" .
    "<th>" . "ID" . "</th>" .
"<th>" . $Lang['name_tabl'] . "</th>" .
"<th>" . $Lang['surname_tabl'] . "</th>" .
"<th>" . $Lang['login_lan'] . "</th>" .
"<th>" . $Lang['pass_lan'] . "</th>" .
"<th>" . $Lang['lang_tabl'] . "</th>" .
"<th>" . $Lang['role_tabl'] . "</th>";

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