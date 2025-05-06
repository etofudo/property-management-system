<?php
    ob_start();
	if(isset($_POST['usn']) && isset($_POST['pasw'])){
		
		$psw = $_POST['pasw'];
		$psw = md5($psw);
		$un = $_POST['usn'];
		include('db.php');
		$x = 0;
		$sql = "select lanlordId from landlords2 where username='$un' and password = '$psw'";
		if($con)
			echo "con works";
		$a = $con->query($sql);
		if($a->num_rows===1){
			foreach ($a as $aa) {
				$x++;
				if(strlen($aa['lanlordId']) != 0 && $x == 1){
					$userid = $aa['lanlordId'];
				}
			};
			if($userid){
				session_start();
				$_SESSION['userid'] = $userid;
				echo "<script>window.location = \"dashboard.php?us=".$userid."\";</script>";
				ob_end_flush();
			}
		}
		else{
			$mg = '<b style=\'color:red;font-size:120%\'>Incorrect Username/Password Combination</b>';
			ob_end_flush();
		}
		
	}
?>