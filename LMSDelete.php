<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Charter for compassion | EMIS</title>
	
</head>
<body>
<?php

$Id = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["Id"])) {
  } else {
    $Id = test_input($_POST["Id"]);
  }
  
  try{
  include('class/mysql_crud.php');
	$db = new Database();
	$db->connect();
	$enString = 'Id="'.$Id.'"';
	$db->delete('lms',$enString);  // Table name, WHERE conditions
	if ($db->rowsEffected()){
		echo '<script language="javascript">';
		echo 'alert("Successfully Deleted"); location.href="LMSDeleteForm.php"';
        echo '</script>';
	}
	else{
		die("Data not Deleted");
	}
	$res = $db->getResult();  
	//print_r($res);
	  
  }
  catch(Exception $e) {
	echo $e->getMessage();
	}
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