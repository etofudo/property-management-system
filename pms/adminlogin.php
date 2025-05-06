<!doctype html>
<html>
	<head>
		<title>PROPERTY MANAGER LOGIN</title>
		<link rel="icon" type="image/css" href="milogo.png"/>
		<meta http-equiv="pragma" content="no-cache"/>
		<link rel="stylesheet" href="formstyle.css"/>
	</head>
	<body>
		<?php
		
			include('adminmodlogin.php');
		
		?>
		<div id="bar">
			<form action="adminlogin.php" method="post">
				<label id="top">Login to PROPERTY MANAGER</label>
				<label id="warn-Info"><?php if(isset($_POST['usn']) && isset($_POST['pasw'])) echo $mg ?></label>
				<label class="fieldLab">Username:</label>
				<input type="text" name="usn"/>
				<label class="fieldLab">Password:</label>
				<input type="Password" name="pasw"/>
				<input type="submit" value="Login"/><input type="reset" value="Cancel"/><a href="adminreg.php" style="position:relative;right:10px;color:#fff;text-decoration:none;">Sign Up</a>
			</form>
		</div>
	</body>
</html>