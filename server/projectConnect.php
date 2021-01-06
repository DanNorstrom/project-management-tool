<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Connect to projects</title>
</head>
<body>

<!-- Purpose: inputs Project form into mysql -->

<?php
// input info and test
$project_name = filter_input(INPUT_POST, 'project_name');

$start_date1 = filter_input(INPUT_POST, 'start_date1');
$start_date2 = filter_input(INPUT_POST, 'start_date2');
$start_date3 = filter_input(INPUT_POST, 'start_date3');

$due_date1 = filter_input(INPUT_POST, 'due_date1');
$due_date2 = filter_input(INPUT_POST, 'due_date2');
$due_date3 = filter_input(INPUT_POST, 'due_date3');

$description = filter_input(INPUT_POST, 'description');

$form_action = filter_input(INPUT_POST, 'form_action');
// null isnt good enough to check state = empty()
//if (!in_array("Null", array($project_name,$start_date1,$start_date2,$start_date3,$due_date1,$due_date2,$due_date3,$description))) {

// these empty() tests needs to be handled better (if in_array() is empty print "elem" is empty)
if ($form_action=="S") {
  $arr = array($project_name,$start_date1,$start_date2,$start_date3,$due_date1,$due_date2,$due_date3,$description);
  $check_input_status = True; // True only if all fields are filled
  foreach ($arr as $var) {
    if (empty($var)) { // isempty
      $check_input_status = False;
      echo "<br> should not be empty"; #var name
      }
  }
}

if ($form_action=="M") {
  $arr = array($project_name,$start_date1,$start_date2,$start_date3,$due_date1,$due_date2,$due_date3,$description);
  $check_input_status = True; // True only if all fields are filled
  foreach ($arr as $var) {
    if (empty($var)) { // isempty
      $check_input_status = False;
      echo "<br> should not be empty"; #var name
      }
  }
}


if ($form_action=="D") {
  $arr = array($project_name);
  $check_input_status = True; // True only if all fields are filled
  foreach ($arr as $var) {
    if (empty($var)) { // isempty
      $check_input_status = False;
      echo "<br> should not be empty"; #var name
      }
  }
}

if ($check_input_status == True) {
  //if not empty, is in prepared statement, add to database
  $dbname = 'db';
  $dbuser = 'user';
  $dbpass = 'password';
  $dbhost = 'db';

  # define variables
  $start_date = $start_date1."-".$start_date2."-".$start_date3;
  $due_date = $due_date1."-".$due_date2."-".$due_date3;

  # New connection
  $mysqli = new mysqli( $dbhost, $dbuser, $dbpass, $dbname );
  if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ";}


if ($form_action=="S") {
  // save new project

  # test prepare
  if (!($stmt = $mysqli->prepare("INSERT INTO projects (project_name,start_date,due_date,description) VALUES (?, ?, ?, ?)"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;}

  # test parameter binding
  if (!$stmt->bind_param('ssss', $project_name, $start_date, $due_date, $description)) {
      echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;}

  # test execute
  if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;}

  # close DB connection
  $stmt->close();
  header('location: /main.html');
}



if ($form_action=="M") {
  // update, modify project

  # test prepare
  if (!($stmt = $mysqli->prepare("UPDATE projects SET start_date=?,due_date=?,description=? WHERE project_name=?"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;}

  # test parameter binding
  if (!$stmt->bind_param('ssss', $start_date, $due_date, $description, $project_name)) {
      echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;}

  # test execute
  if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;}

  # close DB connection
  $stmt->close();
  header('location: /main.html');
}



if ($form_action=="D") {
  // delete project

    if (!($stmt = $mysqli->prepare("DELETE FROM projects WHERE project_name=?"))) {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;}

    # test parameter binding
    if (!$stmt->bind_param('s', $project_name)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;}

    # test execute
    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;}

    # close DB connection
    $stmt->close();
    header('location: /main.html');
  }

  }
  else {
    die;} #header( 'Location: main.html' );}


// print PROJECTS database content
/*
$test_projects_query = "select * from projects";
$test_projects_result = mysqli_query( $mysqli, $test_projects_query );

while( $row = mysqli_fetch_array( $test_projects_result, MYSQLI_ASSOC ) )
{
  echo $row[ 'project_name' ], ' ', $row[ 'start_date' ], ' ',
  $row[ 'due_date' ],' ', $row[ 'description' ], '<br></br>';
}

print("<br></br><br></br>--------------------------<br></br><br></br>");

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

<form action="http://127.0.0.1/main.html">
    <button type="submit">Login</button>
</form>

</body>
</html>
