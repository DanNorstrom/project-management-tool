<!DOCTYPE html>
<html>
<link rel="stylesheet" href="css/mainstyle.css">
<body>

<?php
$dbname = 'db';
$dbuser = 'user';
$dbpass = 'password';
$dbhost = 'db';

# connect to mysql
$con = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname );
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ";}

# Query
$sql = "SELECT * FROM projects";
$result = mysqli_query($con,$sql);

# print
echo "projects";
while($row = mysqli_fetch_array($result)) {

  if (!$row) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
  } 


  $x = uniqid();
  $sDate= explode("-", $row['start_date']);
  $dDate = explode("-", $row['due_date']);
// project bar
  echo '<div class=\'projbar\'>';
  // display name
  echo '<button class=\'project_name_button\' disabled> '.$row['project_name'].'</button>';
  // show description button
  echo '<button class=\'project_button\'; onclick="showTaskDescription(\''.$x.'\')";>';
  echo ' Info </button>';
  // showtask button
  echo '<button class=\'project_button\' onclick="showTasks(\''.$row['project_name'].'\')">';
  echo "Tasks";
  echo "</button>";
// Handler Button
$projectinput = <<<EOT
'{$row['project_name']}','{$sDate[0]}','{$sDate[1]}','{$sDate[2]}','{$dDate[0]}','{$dDate[1]}','{$dDate[2]}','{$row['description']}'
EOT;
  echo '<button class=\'project_button\' onclick="modProject('.$projectinput.')";> Handler </button>';
  echo "</div>";
// description hidden element
  echo '<div class=\'tasktextbar\'; id=\''.$x.'\';>';
//echo '<textarea readonly rows="30" cols="120">'.$row['description'].'</textarea>';
  echo '<textarea readonly> '.$row['description'].'</textarea>';
  echo "</div>";
}

?>
</body>
</html>
