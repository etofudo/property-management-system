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
<?php if(isset($_GET['u'])) {if(isset($_GET['u'])) $id=$_GET['u'];?>
<form action="adminupdatelan.php" method="post" enctype="multipart/form-data">
	<table class="special">
		
		<tr style="display:none"><td>Id: </td><td><input type="text" name="u" value="<?php echo $id;?>"/></td></tr>
		<tr><td>First Name: </td><td><input type="text" name="fname" 
		value="<?php $db = new mysqli('localhost','root','','pmsdemo');
		$rows = $db->query("select fname from landlords2 where lanlordId='$id'");
		foreach ($rows as $row) {
			if(strlen($row['fname']) != 0){
				$d = $row['fname'];
				echo $d;
			}
		};?>"
		/></td></tr>
		<tr><td>Last Name: </td><td><input type="text" name="lname" 
		value='<?php $db = new mysqli('localhost','root','','pmsdemo');
		$rows = $db->query("select lname from landlords2 where lanlordId='$id'");
		foreach ($rows as $row) {
			if(strlen($row['lname']) != 0){
				$d = $row['lname'];
				echo $d;
			}
		};?>'
		/></td></tr>
		<tr><td>Username: </td><td><input type="text" name="uname" 
		value='<?php $db = new mysqli('localhost','root','','pmsdemo');
		$rows = $db->query("select username from landlords2 where lanlordId='$id'");
		foreach ($rows as $row) {
			if(strlen($row['username']) != 0){
				$d = $row['username'];
				echo $d;
			}
		};?>'
		/></td></tr>
		<tr><td>Photo: </td><td><input type="file" name="im"/></td></tr>
		<?php $db = new mysqli('localhost','root','','pmsdemo');
		$rows = $db->query("select gender from landlords2 where lanlordId='$id'");
		foreach ($rows as $row) {
			if(strlen($row['gender']) != 0){
				$d = $row['gender'];
			}
		};?>
		<tr><td>Gender: &nbsp;&nbsp;</td><td>Male<input type="radio" name="gender" value="Male" <?php if($d=="Male") echo "checked";?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Female<input type="radio" name="gender" value="Female" <?php if($d=="Female") echo "checked";?>/></td></tr>
		<tr><td><input type="submit"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type="reset" value="Clear"/></td></tr>
	</table>
</form>
<?php //include('bmireg.php');?>
<?php }?>

<?php 
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$con = new mysqli('localhost','root','','pmsdemo');
	$fname = mysqli_escape_string($con,$_POST['fname']);
	$lname = mysqli_escape_string($con,$_POST['lname']);
	$uname = mysqli_escape_string($con,$_POST['uname']);
	$gender = mysqli_escape_string($con,$_POST['gender']);
	$id = $_POST['u'];
	$ros = $con->query("select img from landlords2 where lanlordId='$id'");
	foreach ($ros as $ro) {
		if(strlen($ro['img']) != 0)
			$pim = $ro['img'];
	}
	if($_FILES['im']['error'] <= 0){
		unlink("$pim".'.png');
		move_uploaded_file($_FILES['im']['tmp_name'],"$pim".'.png');
	}
	else{
		echo 'one or more files not uploaded';
	}
	$sql = "update landlords2 set fname='$fname', lname='$lname', username='$uname', gender='$gender' where lanlordId = '$id';";
	if($con->query($sql) === TRUE){
		echo "Record updated succesfully";
	}
	else{
		echo "Error ".$sql."<hr/>".$con->error;
	}
}
?>

	

<table class="nmtable" >
	<tr id="darkHead">
		<td> Id </td><td> FirstNames </td><td> LastName </td><td> Username </td><td> Gender </td><td> Regdate </td><td> Picture </td><td> Update </td><td> Delete </td>
	</tr>
	<?php 
		$db = new mysqli('localhost','root','','pmsdemo');
		$ros = $db->query("select* from landlords2");
		foreach ($ros as $ro) {?>
			<tr><td>
			<?php
			$tk = $ro['lanlordId'];
			if(strlen($ro['lanlordId']) != 0){
				$n = $ro['lanlordId'];
				echo $n;
			}?><td/>
			<?php
			$tk = $ro['lanlordId'];
			if(strlen($ro['fname']) != 0){
				$n = $ro['fname'];
				echo $n;
			}?><td/>
			<?php
			if(strlen($ro['lname']) != 0){
				$n = $ro['lname'];
				echo $n;
			}?><td/>
			<?php
			if(strlen($ro['username']) != 0){
				$n = $ro['username'];
				echo $n;
			}?><td/>
			<?php
			if(strlen($ro['gender']) != 0){
				$n = $ro['gender'];
				echo $n;
			}?><td/>
			<?php
			if(strlen($ro['regDate']) != 0){
				$n = $ro['regDate'];
				echo $n;
			}?><td/>
			<?php
			if(strlen($ro['img']) != 0){
				$n = $ro['img'].'.png';
				echo "<a href='$n' target='_blank'>".$n."</a>";
			}?><td/>
			<a href='adminupdatelan.php?u=<?php echo $tk?>'>update</a></td>
			<td><a href='adminllist.php?d=<?php echo $tk?>'>delete</a></td>
			</tr>
	<?php };?>
</table>


