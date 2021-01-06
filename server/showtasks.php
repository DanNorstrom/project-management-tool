<!DOCTYPE html>
<html>
<link rel="stylesheet" href="css/mainstyle.css">
<body>

<?php
// the str variable isnt passed into q, q is null


// takes a variable q that represents the project name
// create buttons with onclick that opens tasks to said project


$chosen_project = filter_input(INPUT_GET, 'var1');

//$chosen_project = intval($_GET['q']);

// modified for docker
$dbname = 'db';
$dbuser = 'user';
$dbpass = 'password';
$dbhost = 'db';

# connect to mysql
$con = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname );
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ";}

# Query
$sql = "SELECT * FROM tasks WHERE project_name=\"$chosen_project\"";
$result = mysqli_query($con,$sql);

# print
echo "Tasks <br>";
while($row = mysqli_fetch_array($result)) {

  $x = uniqid();
  $y = uniqid();
  $sDate= explode("-", $row['start_date']);
  $dDate = explode("-", $row['due_date']);


  // color control for completed/due status
    $time1 = strtotime($row['due_date']); // yyyy-mm-dd
    $date = date('Y-m-d',time());
    $time2 = strtotime($date);

    if (($time1 < $time2) and ($row['completed'] != "Y")) {$new_css = "taskbarRed";}
    else if ($row['completed'] == 'Y') {$new_css = "taskbarBlue";}
    else if  ($row['completed'] == "P"){$new_css = "taskbarLBlue";}
    else if  ($row['completed'] == "N"){$new_css = "taskbar";}

    // generate bar and buttons for tasks
    echo '<div class=\''.$new_css.'\'; id=\''.$y.'\';>';
      echo "<a>   ".$row['priority']." | </a>";
      echo "<a> ".$row['task_name']." | </a>";
      echo "<a> ".$row['start_date']." | </a>";
      echo "<a> ".$row['due_date']."</a>";
      echo '<button class=\'task_button\'; onclick=showTaskDescription(\''.$x.'\');>';
      echo ' Info </button>';

// mod task button
$taskinput = <<<EOT
'{$row['project_name']}','{$row['task_name']}','{$row['priority']}','{$row['completed']}','{$sDate[0]}','{$sDate[1]}','{$sDate[2]}','{$dDate[0]}','{$dDate[1]}','{$dDate[2]}','{$row['description']}'
EOT;
echo '<button class=\'task_button\'; onclick="modTask('.$taskinput.')";> Handler </button>';

      /*
      // delete task button this causes linebreak even with dispal, visability NONE, use handler for now
      echo '<form method="post" action="taskConnect.php">';
      echo '<input type="hidden" value="'.$row['project_name'].'" name="project_name" />';
      echo '<input type="hidden" value="'.$row['task_name'].'" name="task_name" />';
      echo '<input type="hidden" value="D" name="form_action" />';
      echo '<button class=\'task_button\' type="submit" >Delete</button>';
      echo '</form>';
      */
      echo "</div>";
      echo '<div class=\'tasktextbar\'; id=\''.$x.'\';>';
    //echo '<textarea readonly rows="30" cols="120">'.$row['description'].'</textarea>';
      echo '<textarea readonly> '.$row['description'].'</textarea>';
    echo "</div>";


    //echo '<script type="text/javascript">',
     //'document.getElementById(\''.$y.'\',\').onload = check_complete_and_date(\''.$y.'\',\''.$row['completed'].'\',\''.$row['due_date'].'\');',
     //'</script>';

}
?>
</body>
</html>
