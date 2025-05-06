<style>
	table.special{
		margin:10px 80px;
		border:1px solid black;
	}
	table.special td{
		height:30px;
	}
	table.special input[type="text"],[type="password"]{
		border:none;
		border-bottom:0.5px solid black;
		outline-style:none;
	}
	table.special input[type="text"]:focus,table.special input[type="password"]:focus{
		border-bottom:2px solid #99f;
	}
</style>
<link rel="stylesheet" type="text/css" href="bmi.css"/>

<form action="lanreg.php" method="post" enctype="multipart/form-data">
	<table class="special">
		<tr><td>Username: </td><td><input type="text" name="usn" required/></td></tr>
		<tr><td>Password: </td><td><input type="password" name="pasw" required/></td></tr>
		<tr><td>Family Name: </td><td><input type="text" name="faname"/></td></tr>
		<tr><td>Establishment Name: </td><td><input type="text" name="ename"/></td></tr>
		<tr><td>First Name: </td><td><input type="text" name="fname"/></td></tr>
		<tr><td>Last Name: </td><td><input type="text" name="lname" required/></td></tr>
		<tr><td>Gender: &nbsp;&nbsp;</td><td>Male<input type="radio" name="gender" value="Male" checked/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Female<input type="radio" name="gender" value="Female"/></td></tr>
		<tr><td>Photo: </td><td><input type="file" name="im"/></td></tr>
		<tr><td><input type="submit"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type="reset" value="Clear"/></td></tr>
	</table>
</form>
<a href='login.php'>login</a>
<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		if($_FILES['im']['error'] > 0){
			echo $_FILES['im']['error'];
		}
		else{
			include('db.php');
			$un = $_POST['usn'];
			$x = 0;
			$sql = "select lanlordId from landlords2 where username='$un'";
			$a = $con->query($sql);
			if($a->num_rows===0){
				$fname = mysqli_escape_string($con,$_POST['fname']);
				$lname = mysqli_escape_string($con,$_POST['lname']);
				$gender = mysqli_escape_string($con,$_POST['gender']);
				$un = mysqli_escape_string($con,$_POST['usn']);
				$psw = md5($_POST['pasw']);
				$ros = $con->query("select lastlanlordId, noofprofilepics from general");
					foreach ($ros as $ro) {
						$ll = $ro['lastlanlordId'] + 1;
						$npp = $ro['noofprofilepics'] + 1;
					}
				$pim = "profilepics/"."$ll"."_profilepics_"."$npp";
				move_uploaded_file($_FILES['im']['tmp_name'],"$pim".'.png');
				$sql = "INSERT INTO landlords2 (username, password, fname, lname, gender, img) VALUES ('$un', '$psw','$fname','$lname','$gender','$pim')";
				if($con->query($sql) === TRUE){
					echo "New records created succesfully";
					$ros = $con->query("select lastlanlordId, noofprofilepics, nooflandlds from general");
					foreach ($ros as $ro) {
						$ll = $ro['lastlanlordId'] + 1;
						$npp = $ro['noofprofilepics'] + 1;
						$nl = $ro['nooflandlds'] + 1;
					}
					$sql = "update general set lastlanlordId='$ll', noofprofilepics='$npp', nooflandlds='$nl'";
					if($con->query($sql) === TRUE){
						echo "Records updated succesfully";
					}
					else{
						echo "Error ".$sql."<hr/>".$con->error;
					}
				}
				else{
					echo "Error ".$sql."<hr/>".$con->error;
				}
			}
			else
				echo '<b style=\'font-size:120%\'>Username Already in Use</b>';

		}
	}
	
?>

