<?php
		
	/*if(isset($_POST['usn']) && isset($_POST['pasw'])){
		
		$psw = $_POST['pasw'];
		$psw = md5($psw);
		$un = $_POST['usn'];
		$con = new mysqli('localhost', 'root', '', 'cmp313_7');
		$x = 0;
		//$lnk = "eli.php";
		//$con->query('USE cmp313_2, create table landlords2(lanlordId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,fname varchar(300) NULL,lname varchar(300) NULL, regDate TIMESTAMP)') == TRUE
		//$sendr = "elijah";
		$sql = "select lanlordId from landlords2 where username='$un'";
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
				header('location:dashboard.php?us='.$userid);
			}
		}
		else
			$mg = '<b style=\'color:red;font-size:120%\'>Incorrect Username/Password Combination</b>';
		
	}*/

?>
<h2>Send e-mail to johnnyodufote@gmail.com:</h2>

<form action="mailto:johnnyodufote@gmail.com" method="post" enctype="text/plain">
Name:<br>
<input type="text" name="name"><br>
E-mail:<br>
<input type="text" name="mail"><br>
Comment:<br>
<input type="text" name="comment" size="50"><br><br>
<input type="submit" value="Send">
<input type="reset" value="Reset">
</form>
