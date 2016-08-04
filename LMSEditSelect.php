<html>
<body>
<?php

$Id = $gr = $leave = $sdate = $edate = $reason = $desc = "";
$status = $date = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["Id"])) {
		}else {
			$Id = test_input($_POST["Id"]);
		}

			include('class/mysql_crud.php');
			$db = new Database();
			$db->connect();
			$enString = 'Id="'.$Id.'"';
			$db->select('lms','Id,GRNum,LeaveType,SDate,EDate,Reason,Description, Status,Date',NULL, $enString,'Id ASC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
			$res = $db->getResult();
			//print_r($res);
			
		if (count($res) > 0) {
	
			$Id = $res[0]['Id'];
			$gr = $res[0]['GRNum'];
			$leave = $res[0]['LeaveType'];
			$sdate = $res[0]['SDate'];
			$edate = $res[0]['EDate'];
			$reason = $res[0]['Reason'];
			$desc = $res[0]['Description'];
			$status = $res[0]['Status'];
			$date = $res[0]['Date'];
		}
		else{
			 die("Data not found");
		}
	}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} 

?>

</html>
</body>