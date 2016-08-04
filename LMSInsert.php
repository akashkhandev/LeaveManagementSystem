<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Charter for compassion | EMIS</title>
</head>
<body>

<?php

$gr = $leave = $sdate = $edate = $reason = $desc = "";
$status = "Pending";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
  if (empty($_POST["gr"])) {
  } else {
    $gr = test_input($_POST["gr"]);
  }
  
  if (empty($_POST["leave"])) {
  } else {
    $leave = test_input($_POST["leave"]);
  }
  
  if (empty($_POST["sdate"])) {
  } else {
    $sdate = test_input($_POST["sdate"]);
  }
  
  if (empty($_POST["edate"])) {
  } else {
    $edate = test_input($_POST["edate"]);
  }
  
  if (empty($_POST["reason"])) {
  } else {
    $reason = test_input($_POST["reason"]);
  }

  if (empty($_POST["desc"])) {
	$desc = "";
  } else {
    $desc = test_input($_POST["desc"]);
  }
  
	include('class/mysql_crud.php');
	$db = new Database();
	$db->connect(); // Escape any input before insert
	$db->insert('lms',array('GRNum'=>$gr,'LeaveType'=>$leave,'SDate'=>$sdate,'EDate'=>$edate, 'Reason'=>$reason, 'Description'=>$desc, 'Status'=>$status, 'Date'=>date("Y-m-d")));  // Table name, column names and respective values
	if ($db->rowsEffected()){
		echo '<script language="javascript">';
		echo 'alert("Successfully Saved And ID:'.$db->lastId().'"); location.href="LMSInsertForm.php"';
        echo '</script>';
	}
	else{
		die("Data not Saved");
	}
	$res = $db->getResult();  
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

</body>
</html>