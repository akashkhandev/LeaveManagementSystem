<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Charter for compassion | EMIS</title>
	
</head>
<body>

<?php
session_start();
//$keyArray = array();
$statusArray = array();
$valueArray = array();

$idArray = $_SESSION['idArray'];
print_r($idArray);

if(count($idArray) > 0){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//print_r($_POST);
	
	foreach($_POST as $x => $x_value) {
		
		$val;
		
		if (empty($x_value)) {
			$val = "";
		} else {
			$val = test_input($x_value);
		}
		array_push($valueArray, $val);
	}
	//print_r($valueArray);
	if(count($valueArray)>0){
		
		for($i=0; $i<count($valueArray); $i++){
			array_push($statusArray, $valueArray[$i]);
		}
		
			
			include('class/mysql_crud.php');
			$db = new Database();
			$db->connect(); // Escape any input before insert
			
				
			for($j=0; $j<count($idArray); $j++){
				$enString = 'Id="'.$idArray[$j].'"';
				$db->update('lms',array('Status'=>$statusArray[$j]), $enString); // Table name, column names and values, WHERE conditions
				
				$res = $db->getResult();
				
				echo '<script language="javascript">';
				echo 'location.href="LMSMainForm.php"';
				echo '</script>';
			}
	}
	else{
		 die("Data not found");
	}
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<body>
<html>