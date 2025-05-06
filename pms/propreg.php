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
	<?php session_start();
	if(!isset($_GET['u'])) 
		$_GET['u'] = '';
	if((isset($_SESSION['userid']) && $_SESSION['userid'] == $_GET['u']) || (isset($_SESSION['userid']) && $_SESSION['userid'] == $_POST['u'])){?>
	<form action="propreg.php" method="post" enctype="multipart/form-data">
		<table class="special">
			<input type='hidden' name='u' value="<?php if(isset($_GET['u'])) echo $_GET['u']; if(isset($_POST['u'])) echo $_POST['u']?>"/>
			<tr><td>Category: </td><td><select name="proptype">
							<option value="Land">Land</option>
							<option value="Building">Building</option>
							<option value="Pond">Private Pond</option>
							<option value="Pool">Private Pool</option>
							<option value="Kiosk/Shop">Kiosk/Shed</option>
							<option value="Car">Car</option>
						<select/></td></tr>
			<tr><td>Property Description: </td><td><input type="text" name="propdesc" required/></td></tr>
			<tr><td>Address: </td><td><input type="text" name="padd" required/></td></tr>
			<tr><td>Property Photo: </td><td><input type="file" name="propim"/></td></tr>
			<tr><td>Evidence of ownership: </td><td><input type="file" name="propev"/></td></tr>
			<tr><td><input type="submit"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type="reset" value="Clear"/></td></tr>
		</table>
	</form>
	<?php }
		else
			echo "<a style='font-weight:bold;font-size:900%;color:red;background:pink;margin:60px' href='login.php'>Click to Continue</a><br/>";
		?>
	<?php
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			if($_FILES['propim']['error'] > 0 && $_FILES['propev']['error'] > 0){
				echo $_FILES['propim']['error'].' and '.$_FILES['propim']['error'] > 0;
			}
			else{
				include('db.php');
				$own = $_POST['u'];
				$ptyp = mysqli_escape_string($con,$_POST['proptype']);
				$pdesc = mysqli_escape_string($con,$_POST['propdesc']);
				$ev = $pdesc.'ev';
				$add = mysqli_escape_string($con,$_POST['padd']);
				$ros = $con->query("select lastpropertyId, noofpropev from general");
					foreach ($ros as $ro) {
						$lp = $ro['lastpropertyId'] + 1;
					}
				$pim = "proppics/"."$own"."_proppics_"."$lp";
				$pev = "propev/"."$own"."_propev_"."$lp";
				if(move_uploaded_file($_FILES['propim']['tmp_name'],"$pim".'.png'))
					$imag = true;
				if(move_uploaded_file($_FILES['propev']['tmp_name'],"$pev".'.png'))
					$evid = true;
				$sql = "INSERT INTO properties (proptype, propertydescription, address, propimg, evidence, owner) VALUES ('$ptyp', '$pdesc','$add','$pim','$pev','$own');";
				if($con->query($sql) === TRUE){
					echo "New records created succesfully";
					if($imag === TRUE && $evid === TRUE){
						$ros = $con->query("select lastpropertyId, noofproppics, noofprops, noofpropev from general");
						foreach ($ros as $ro) {
							$lp = $ro['lastpropertyId'] + 1;
							$npp = $ro['noofproppics'] + 1;
							$np = $ro['noofprops'] + 1;
							$nev = $ro['noofpropev'] + 1;
						}
						$sql = "update general set lastpropertyId='$lp', noofproppics='$npp', noofprops='$np', noofpropev='$nev'";
						if($con->query($sql) === TRUE){
							echo "Records updated succesfully";
						}
						else{
							echo "Error ".$sql."<hr/>".$con->error;
						}
					}
				}
				else{
					echo "Error ".$sql."<hr/>".$con->error;
				}
			}
			
			if(isset($_GET['d'])){
				$id = $_GET['d'];
				include('db.php');
				$sql = "DELETE FROM landlords2 WHERE lanlordId = $id;";
				if($con->query($sql) === TRUE){
					echo "Record deleted succesfully";
					if($con->query($sql) === TRUE){
						echo "Record deleted succesfully";
						$ros = $con->query("select noofproppics, noofprops, noofpropev from general");
						foreach ($ros as $ro) {
							$npp = $ro['noofproppics'] - 1;
							$nl = $ro['noofprops'] - 1;
							$nev = $ro['noofpropev'] - 1;
						}
						$sql = "update general set noofproppics='$npp', noofprops='$nl', noofpropev='$nev'";
					}
				}
				else{
					echo "Error ".$sql."<hr/>".$con->error;
				}
			}
		}
	?>
	