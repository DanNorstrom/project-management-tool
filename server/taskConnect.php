<?php
// settings
$form_action = filter_input(INPUT_POST, 'form_action'); // D=delete, S=save,

// input info and test
$project_name = filter_input(INPUT_POST, 'project_name');
$task_name = filter_input(INPUT_POST, 'task_name');

$priority = filter_input(INPUT_POST, 'priority');
$completed = filter_input(INPUT_POST, 'completed');

$start_date1 = filter_input(INPUT_POST, 'start_date1');
$start_date2 = filter_input(INPUT_POST, 'start_date2');
$start_date3 = filter_input(INPUT_POST, 'start_date3');

$due_date1 = filter_input(INPUT_POST, 'due_date1');
$due_date2 = filter_input(INPUT_POST, 'due_date2');
$due_date3 = filter_input(INPUT_POST, 'due_date3');

$description = filter_input(INPUT_POST, 'description');


/////////////////////////
// ERROR CHECKING BLOCK//
/////////////////////////
if ($form_action=="S") {
$arr = array($project_name, $task_name, $priority,$completed, $start_date1,$start_date2,$start_date3,$due_date1,$due_date2,$due_date3,$description);
$check_input_status = True; // True only if all fields are filled
foreach ($arr as $var) {
  if (empty($var)) { // isempty
    $check_input_status = False;
    echo "<br> should not be empty"; #var name
    }
}
}


if ($form_action=="M") {
$arr = array($project_name, $task_name, $priority,$completed, $start_date1,$start_date2,$start_date3,$due_date1,$due_date2,$due_date3,$description);
$check_input_status = True; // True only if all fields are filled
foreach ($arr as $var) {
  if (empty($var)) { // isempty
    $check_input_status = False;
    echo "<br> should not be empty"; #var name
    }
}
}

if ($form_action=="D") {
$arr = array($project_name, $task_name);
$check_input_status = True; // True only if all fields are filled
foreach ($arr as $var) {
  if (empty($var)) { // isempty
    $check_input_status = False;
    echo "<br> should not be empty"; #var name
    }
}
}

/////////////////////////
//   FUNCTION BLOCK    //
/////////////////////////
if ($check_input_status == True) {
  //if not empty, is in prepared statement, add to database
  # server info and test
  $dbname = 'db';
  $dbuser = 'user';
  $dbpass = 'password';
  $dbhost = 'db';

  # New connection
  $mysqli = new mysqli( $dbhost, $dbuser, $dbpass, $dbname );
  if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ";}

if ($form_action=="S") {
  // save data to database, new input

  # define variables
  $start_date = $start_date1."-".$start_date2."-".$start_date3;
  $due_date = $due_date1."-".$due_date2."-".$due_date3;

  if (!($stmt = $mysqli->prepare("INSERT INTO tasks (project_name, task_name, priority, completed, start_date,due_date,description) VALUES (?, ?, ?, ?, ?, ?, ?)"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;}

  # test parameter binding
  if (!$stmt->bind_param('sssssss', $project_name, $task_name, $priority, $completed, $start_date, $due_date, $description)) {
      echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;}

  # test execute
  if (!$stmt->execute()) {
      echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;}

  # close DB connection
  $stmt->close();
  header('location: /index.html');
}


if ($form_action=="M") {
  // Update, modify task

  # define variables
  $start_date = $start_date1."-".$start_date2."-".$start_date3;
  $due_date = $due_date1."-".$due_date2."-".$due_date3;

  if (!($stmt = $mysqli->prepare("UPDATE tasks SET priority=?, completed=?, start_date=?,due_date=?,description=? WHERE project_name=? AND task_name=?"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;}

  # test parameter binding
  if (!$stmt->bind_param('sssssss',$priority, $completed, $start_date, $due_date, $description, $project_name, $task_name)) {
      echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;}

  # test execute
  if (!$stmt->execute()) {
      echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;}

  # close DB connection
  $stmt->close();
  header('location: /main.html');
}



if ($form_action=="D") {
  // delete task

  if (!($stmt = $mysqli->prepare("DELETE FROM tasks WHERE project_name=? AND task_name=? "))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;}

  # test parameter binding
  if (!$stmt->bind_param('ss', $project_name, $task_name)) {
      echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;}

  # test execute
  if (!$stmt->execute()) {
      echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;}

  # close DB connection
  $stmt->close();
  header('location: /index.html');
}

else {die;} #header( 'Location: index.html' );}
}

/*

// check TASKS database content
$test_tasks_query = "select * from tasks";
$test_tasks_result = mysqli_query( $mysqli, $test_tasks_query );

while( $row = mysqli_fetch_array( $test_tasks_result, MYSQLI_ASSOC ) )
{
  echo $row[ 'project_name' ], ' ',$row[ 'task_name' ], ' '
  , $row[ 'start_date' ], ' ', $row[ 'due_date' ],' '
  ,$row[ 'description' ], '<br></br>';
}
*/
?>