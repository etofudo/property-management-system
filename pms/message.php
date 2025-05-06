<!doctype html>
<html>
<head>
	<title> MESSAGE </title>
	<style>
		body{
			background:#c09ff0;
			color:#444;
		}
	</style>
	<meta http-equiv="pragma" content="no-cache"/>
</head>
<body>
	<div style="font-size:100px">
	<?php
		
		$db = new mysqli('localhost','root','','urlmsg');
		$x = 0;
		if(isset($_GET['b'])){
			//echo 'yay';
			$msgn = $_GET['b'];
			$msgn = $msgn/71;
			$rows = $db->query("select messagedetails from message where messageid='$msgn'");
			foreach ($rows as $row) {
				$x++;
				if(strlen($row['messagedetails']) != 0){
					$n = $row['messagedetails'];
					echo $n;
				}
			};
			
		};
	?>
	</div>
</body>
</html>