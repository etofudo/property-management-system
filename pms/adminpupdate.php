<style>
	table.special{
		margin:10px 80px;
		border:1px solid black;
	}
	table.special td{
		height:30px;
	}
	table.special input[type="text"]{
		border:none;
		border-bottom:0.5px solid black;
		outline-style:none;
	}
	table.special input[type="text"]:focus{
		border-bottom:2px solid #99f;
	}
</style>
<link rel="stylesheet" type="text/css" href="bmi.css"/>
<?php if(isset($_GET['u'])) {$id=$_GET['u']; ?>
<form action="adminpupdate.php" method="post" enctype="multipart/form-data">
	<table class="special">
		<input type='hidden' name='u' value="<?php echo $_GET['u'] ?>"/>
		<?php $db = new mysqli('localhost','root','','pmsdemo');
		$rows = $db->query("select proptype from properties where propertyId='$id'");
		foreach ($rows as $row) {
			if(strlen($row['proptype']) != 0){
				$pt = $row['proptype'];
			}
		};?>
		<tr><td>Owner:  </td><td><select name="own">
						<?php
							$rows = $db->query("select fname,lname,owner from properties,landlords2 where owner = lanlordId and propertyId='$id'");
							foreach ($rows as $row) {
								if(strlen($row['fname']) != 0 and strlen($row['lname']) != 0){
									$d = $row['fname'].' '.$row['lname'];
									$dd = $row['owner'];
								}
							};
							$rows = $db->query("select fname,lname,lanlordId from landlords2");
							foreach ($rows as $row) {
								if(strlen($row['fname']) != 0 and strlen($row['lname']) != 0){
									$d = $row['fname'].' '.$row['lname'];
									$ld = $row['lanlordId'];
								}?>
								<option value='<?php echo $ld ?>'  <?php if($ld==$dd) echo 'selected';?>><?php echo $d?></option>
								<?php
							};?>	

					<select/>
		
		</td></tr>
		<tr><td>Category: </td><td><select name="proptype">
						<option value="Land"  <?php if($pt=="Land") echo "selected";?>>Land</option>
						<option value="Building" <?php if($pt=="Building") echo "selected";?>>Building</option>
						<option value="Pond" <?php if($pt=="Pond") echo "selected";?>>Private Pond</option>
						<option value="Pool" <?php if($pt=="Pond") echo "selected";?>>Private Pool</option>
						<option value="Kiosk/Shed" <?php if($pt=="Kiosk/Shed") echo "selected";?>>Kiosk/Shed</option>
					<select/></td></tr>
		<tr><td>Property Description: </td><td><input type="text" name="propdesc" 
		value="<?php
		$rows = $db->query("select propertydescription from properties where propertyId='$id'");
		foreach ($rows as $row) {
			if(strlen($row['propertydescription']) != 0){
				$d = $row['propertydescription'];
				echo $d;
			}
		};?>" required/></td></tr>
		<tr><td>Address: </td><td><input type="text" name="padd" 
		value="<?php
		$rows = $db->query("select address from properties where propertyId='$id'");
		foreach ($rows as $row) {
			if(strlen($row['address']) != 0){
				$addr = $row['address'];
				echo $addr;
			}
		};?>"required/></td></tr>
		<tr><td>Property Photo: </td><td><input type="file" name="propim"></td></tr>
		<tr><td>Evidence: </td><td><input type="file" name="propev"></td></tr>
		<tr><td><input type="submit"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type="reset" value="Clear"/></td></tr>
	</table>
</form>
<?php }?>

<?php 
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$id = $_POST['u'];
		if($_FILES['propim']['error'] > 0)
				echo $_FILES['propim']['error'];
		
			$con = new mysqli('localhost','root','','pmsdemo');
			$own = $_POST['own'];
			$ptyp = mysqli_escape_string($con,$_POST['proptype']);
			$pdesc = mysqli_escape_string($con,$_POST['propdesc']);
			$add = mysqli_escape_string($con,$_POST['padd']);
			$ros = $con->query("select propimg, evidence from properties where propertyId='$id'");
			foreach ($ros as $ro) {
				if(strlen($ro['propimg']) != 0)
					$pim = $ro['propimg'];
				if(strlen($ro['evidence']) != 0)
					$pev = $ro['evidence'];
			}
			if($_FILES['propim']['error'] <= 0 && $_FILES['propev']['error'] <= 0){
				unlink("$pim".'.png');
				unlink("$pev".'.png');
				move_uploaded_file($_FILES['propim']['tmp_name'],"$pim".'.png');
				move_uploaded_file($_FILES['propev']['tmp_name'],"$pev".'.png');
			}
			else{
				echo 'one or more files not uploaded';
			}
			$sql = "update properties set proptype='$ptyp', propertydescription='$pdesc', address='$add', propimg='$pim', owner='$own' where propertyId = $id;";
			if($con->query($sql) === TRUE){
				echo "Updated succesfully";
			}
			else{
				echo "Error ".$sql."<hr/>".$con->error;
			}
		
	}
	
?>
<table class="nmtable" >
	<tr id="darkHead">
		<td> Property ID </td><td> Property Type </td><td> Property Description </td><td> Owner </td><td> Address </td><td> picture </td><td> Update </td><td> Delete </td>
	</tr>
	<?php 
		if(isset($_GET['us']))
			$h = $_GET['us'];
		$db = new mysqli('localhost','root','','pmsdemo');
		$ros = $db->query("select* from properties");
		foreach ($ros as $ro) {?>
			<tr><td>
			<?php
			$tk = $ro['propertyId'];
			if(strlen($ro['propertyId']) != 0){
				$n = $ro['propertyId'];
				echo $n;
			}?><td/>
			<?php
			if(strlen($ro['proptype']) != 0){
				$n = $ro['proptype'];
				echo $n;
			}?><td/>
			<?php
			if(strlen($ro['propertydescription']) != 0){
				$n = $ro['propertydescription'];
				echo $n;
				$l = $n;
			}?><td/>
			<?php
			$rows = $db->query("select fname,lname,owner from properties,landlords2 where owner = lanlordId and propertyId='$tk'");
			foreach ($rows as $row) {
				if(strlen($row['fname']) != 0 and strlen($row['lname']) != 0){
					$n = $row['fname'].' '.$row['lname'];
					echo $n;
				}
			};?>
			<td/>
			<?php
			if(strlen($ro['address']) != 0){
				$n = $ro['address'];
				echo $n;
			}?><td/>
			<?php
			if(strlen($ro['propimg']) != 0){
				$n = $ro['propimg'].'.png';
				echo "<a href='$n' target='_blank'>".$n."</a>";
			}?><td/>
			<a href='adminpupdate.php?u=<?php echo $tk?>'>update</a></td>
			<td><a href='adminplist.php?d=<?php echo $tk?>'>delete</a></td>
			</tr>
	<?php };?>
</table>