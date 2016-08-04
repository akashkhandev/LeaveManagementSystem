<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Charter for compassion | EMIS</title>
</head>
<body>

<div id="formId">
<form id="studentform" action="LMSInsert.php" method="post">
  GR Number:<br>
  <input type="text" name="gr" required>
  <br>
  Leave Type:<br>
	<select name="leave">
      <option value="Sick Leave">Sick Leave</option>
      <option value="Emergency Leave">Emergency Leave</option>
      <option value="Maternily Leave">Maternily Leave</option>
      <option value="Casual Leave">Casual Leave</option>
      <option value="Annual Leave">Annual Leave</option>
      <option value="Other" selected>Other</option>
    </select><br>
  Starting Date:<br>
  <input type="date" name="sdate" required>
  <br>
  Ending Date:<br>
  <input type="date" name="edate" required>
  <br>
  Reason:<br>
  <input type="text" name="reason" required>
  <br>
  Desc:<br>
  <input type="text" name="desc">
  <br>
  <input type="submit" value="Submit" >
</form>
</div>
</body>
</html>