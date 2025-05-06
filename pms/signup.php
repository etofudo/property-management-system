<!doctype html>
<html>
	<head>
		<title>URL MESSENGER REGISTER</title>
		<link rel="icon" type="image/png" href="milogo.png"/>
		<meta http-equiv="pragma" content="no-cache"/>
		<meta charset="utf-8"/>
		<style>
			body{
				background:#225182;
			}
			form{
				margin:50px auto 50px auto;
				background:#868288;
				width:700px;
			}
			#top{
				display:block;
				text-align:center;
				color:#fff;
				height:80px;
				padding-top:20px;
				font-size:200%;
				border-bottom:1.3px groove #fff;
			}
			label.fieldLab{
				display:block;
				font-size:140%;
				color:#fff;
				margin-left:22px;
				margin-top:25px;
			}
			input[type="text"],[type="password"],[type="file"]{
				width:85%;
				height:40px;
				outline-style:none;
				font-size:110%;
				color:#fff;
				margin-left:22px;
				padding-right: 12px;
				padding-left: 12px;
				box-shaddow:5px #000;
				font-family:ebrima;
				background:#60605f;
				border:none;
			}
			input[type="submit"]{
				margin:16px 50px 12px 80px; 
				height:40px;
				background:#302b48;
				border:none;
				color:#fff;
				width:100px;
				box-shaddow:5px #000;
				font-family:ebrima;
			}
			input[type="reset"]{
				margin:16px 50px 12px 80px; 
				height:40px;
				background:#302b48;
				border:none;
				color:#fff;
				width:100px;
				box-shaddow:5px #000;
				font-family:ebrima;
			}
			#bar{
				width:90%;
				margin:70px 20px 08px 50px;
				border-bottom:40px solid #fff;
				border-top:40px solid #fff;
			}
		</style>
	</head>
	<body>
	<?php
		
			if(isset($_POST['email']) && isset($_POST['psw'])){
				
				$psw = $_POST['psw'];
				$psw = md5($psw);
				$email = $_POST['email'];
				$con = new mysqli('localhost', 'root', '', 'urlmsg');
				//$lnk = "eli.php";
				//$con->query('USE cmp313_2, create table landlords2(lanlordId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,fname varchar(300) NULL,lname varchar(300) NULL, regDate TIMESTAMP)') == TRUE
				//$sendr = "elijah";
				$sql = "INSERT into user (email, password) values('$email', '$psw')";
				if($con->query($sql) === TRUE){
					$mg = 'Success';
				}
				else
					$mg = '<b style=\'color:red;font-size:110%\'>Failure to submit</b>';
				
			}
		
		?>
	<a href="bmisys.php" style="color:#fff;margin-left:200px;font-size:1.3em;text-decoration:none"><<< &nbsp;&nbsp;Back To Home</a>
		<div id="bar">
			<!--<video src="serva.php?stn=w" style="margin:20px 20px;width:400px;height:160px;object-fit:contain"/>-->
			<form action="signup.php" method="post" enctype="multipart/form-data">
				<label id="top">Register for URL MESSENGER</label>
				<label id="warn-Info"><?php if(isset($_POST['email']) && isset($_POST['psw'])) echo $mg ?></label>
				<label class="fieldLab">Email:</label>
				<input type="text" name="email" required />
				<label class="fieldLab">Password:</label>
				<input type="Password" name="psw" required />
				<label class="fieldLab">Comfirm Password:</label>
				<input type="Password" required />
				<input type="submit" value="Register"/><input type="reset" value="Cancel"/><a href="login.php" style="position:relative;right:10px;color:#fff;text-decoration:none;">Login</a>
			</form>
			
		</div>
	</body>
	<script>
		
	</script>
</html>