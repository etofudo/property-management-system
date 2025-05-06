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
	if(!isset($_POST['u'])) 
		$_POST['u'] = '';
	if((isset($_SESSION['userid']) && $_SESSION['userid'] == $_GET['u']) || (isset($_SESSION['userid']) && $_SESSION['userid'] == $_POST['u'])){?>
	<?php 
		
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			unset($_GET['u']);
			$id = $_POST['u'];
			incude('db.php');
			$ros = $con->query("select img from pmsadmin where adminid=$id");
			foreach ($ros as $ro) {
				if(strlen($ro['img']) != 0)
					$pim = $ro['img'];
			}
			if($_FILES['im']['error'] > 0){
				echo $_FILES['im']['error'];
			}
			else{
				unlink("$pim".'.png');
				move_uploaded_file($_FILES['im']['tmp_name'],"$pim".'.png');
			}
		}
		?>
		<?php 
			if(isset($_GET['u'])){
				$h = $_GET['u'];
			}
			else if(isset($_POST['u'])){
				$h = $_POST['u'];
			}
			include('db.php');
			$ros = $con->query("select* from pmsadmin where adminid=$h");
			foreach ($ros as $ro) {?>
				<image src="
				<?php
				if(strlen($ro['img']) != 0){
					$n = $ro['img'].'.png';
					echo $n;
				}?>"
				width='300px' height='500px'/>
				<button onclick="fom.style.display = 'block';">Change Profile Picture</button>
				<form id='fom' action="adminprofile.php" method="post" enctype="multipart/form-data" style="display:none">
					<table class="special">
						<?php if(isset($_GET['u'])) $tok = $_GET['u']; 
						elseif(isset($_POST['u'])) $tok = $_POST['u'];
						?>
						<input type='hidden' name='u' value="<?php echo $tok ?>"/>
						<tr><td><input type="file" name="im"/></td></tr>
						<tr><td><input type="submit"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type="reset" value="Clear"/></td></tr>
					</table>
				</form>
				<?php
				$tk = $ro['adminid'];
				if(strlen($ro['fname']) != 0){
					$n = $ro['fname'];
					echo 'Firstname: '.$n;
				}?>
				<?php
				if(strlen($ro['lname']) != 0){
					$n = $ro['lname'];
					echo 'Lastname: '.$n;
				}?>
				<?php
				if(strlen($ro['username']) != 0){
					$n = $ro['username'];
					echo 'Username: '.$n;
				}?>
				<?php
				if(strlen($ro['gender']) != 0){
					$n = $ro['gender'];
					echo 'Gender: '.$n;
				}?>
				
				
		<?php };?>
		<?php }
			else
				echo "<a style='font-weight:bold;font-size:900%;color:red;background:pink;margin:60px' href='adminlogin.php'>Click to Continue</a><br/>";
			?>
	
<script>
	
</script>
