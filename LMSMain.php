<html>
<body>

<?php
session_start();
$gr = $leave = $sdate = $edate = $reason = $desc = $status = "";
$idArray = array();
		
	include('class/mysql_crud.php');
	$db = new Database();
	$db->connect();
	$enString = 'Status="Pending"';
	$db->select('lms','Id,GRNum,LeaveType,SDate,EDate,Reason,Description,Status,Date',NULL,$enString,'Date DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
	$res = $db->getResult();
	//print_r($res);

	if(count($res)>0){
		
		$enString = 'GR_No="'.$res[0]["GRNum"].'"';
		$db->select('employeinformation','Full_name',NULL,$enString,'GR_No ASC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
		$res2 = $db->getResult();
		$name = "";
		if(count($res2)>0){
			$name = $res2[0]["Full_name"];
		}
		
		echo '<form id="att_form" action="LMSMainInsert.php" method="post">';
		echo "<table class='pure-table'><thead><tr><th>S. No.</th><th>GR Number</th><th>Name</th><th>Leave Type</th><th>Starting Date</th><th>Ending Date</th><th>Reason</th><th>Description</th><th>Status</th><th>Date</th></tr></thead>";
		for($x = 0; $x < count($res); $x++) {
			echo "<tbody><tr>";
			$statusString ='name="status'.$x.'"';
			$num = $x + 1;
			$pend = "";
			if ($statusString == "Pending"){
				$pend = " selected=\"selected\"";
			}
			$appr = "";
			if ($statusString == "Approved"){
				$appr = " selected=\"selected\"";
			}
			$disapp = "";
			if ($statusString == "Disapproved"){
				$disapp = " selected=\"selected\"";
			}
			echo "<td>".$num."</td><td>".$res[$x]["GRNum"]."</td><td>".$name."</td><td>".$res[$x]["LeaveType"]."</td><td>".$res[$x]["SDate"]."</td><td>".$res[$x]["EDate"]."</td><td>".$res[$x]["Reason"]."</td><td>".$res[$x]["Description"].'</td><td>'.$res[$x]["Date"].'</td><td><select '.$statusString.'><option value="Pending" '.$pend.'>Pending</option><option value="Approved"'.$appr.'>Approved</option><option value="Disapproved"'.$disapp.'>Disapproved</option></select></td><td>'.$res[$x]["Date"].'</td></td>';
			echo "</tr></tbody>";
			
			//print "Hello table!";
			array_push($idArray, $res[$x]["Id"]);
		}
		echo "</table>";
		echo '<br><input type="submit" value="Submit" ></form>';
		
		$_SESSION['idArray'] = $idArray;
	}
	else{
		die("Data not found");
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