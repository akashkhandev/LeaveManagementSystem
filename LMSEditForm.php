<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Charter for compassion | EMIS</title>

</head>
<body>

	<?php
		include_once('LMSEditSelect.php');
	?> 
	
<div id="formId">
<form id="studentform" action="LMSEdit.php" method="post">
	<h5>ID: <?php echo $Id; ?></h5>
  <input type="hidden" name="Id" value="<?php echo $Id; ?>" required>
	<h5>GR Number: <?php echo $gr; ?></h5>
  <input type="hidden" name="gr" value="<?php echo $gr; ?>" required>
  Leave Type:<br>
	<select name="leave">
      <option value="Sick Leave" <?php if ($leave == 'Sick Leave') echo ' selected="selected"'; ?>>Sick Leave</option>
      <option value="Emergency Leave" <?php if ($leave == 'Emergency Leave') echo ' selected="selected"'; ?>>Emergency Leave</option>
      <option value="Maternily Leave" <?php if ($leave == 'Maternily Leave') echo ' selected="selected"'; ?>>Maternily Leave</option>
      <option value="Casual Leave" <?php if ($leave == 'Casual Leave') echo ' selected="selected"'; ?>>Casual Leave</option>
      <option value="Annual Leave" <?php if ($leave == 'Annual Leave') echo ' selected="selected"'; ?>>Annual Leave</option>
      <option value="Other" selected <?php if ($leave == 'Other') echo ' selected="selected"'; ?>>Other</option>
    </select><br>
  Starting Date:<br>
  <input type="date" name="sdate" value="<?php echo $sdate; ?>" required>
  <br>
  Ending Date:<br>
  <input type="date" name="edate" value="<?php echo $edate; ?>" required>
  <br>
  Reason:<br>
  <input type="text" name="reason" value="<?php echo $reason; ?>" required>
  <br>
  Desc:<br>
  <input type="text" name="desc" value="<?php echo $desc; ?>">
  <br>
  <input type="submit" value="Submit" required>

 </form>
 </div>
</body>
</html>