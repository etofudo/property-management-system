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
                       <?php
					if(isset($_GET['d'])){
						$id = $_GET['d'];
						include('db.php');
						$sql = "DELETE FROM properties WHERE propertyId = $id;";
						if($con->query($sql) === TRUE){
							echo "Record deleted succesfully";
							$ros = $con->query("select noofproppics, noofprops, noofpropev from general");
							foreach ($ros as $ro) {
								$npp = $ro['noofproppics'] - 1;
								$nl = $ro['noofprops'] - 1;
								$nev = $ro['noofpropev'] - 1;
							}
							$sql = "update general set noofproppics='$npp', noofprops='$nl', noofpropev='$nev'";
							if($con->query($sql) === TRUE){
								echo "Records deleted succesfully";
							}
							else{
								echo "Error ".$sql."<hr/>".$con->error;
							}
						}
						else{
							echo "Error ".$sql."<hr/>".$con->error;
						}
					}
				?>
			<?php session_start();if(isset($_SESSION['userid']) && $_SESSION['userid'] == $_GET['u']){ $_SESSION['userid'] = $ha = $_GET['u'];?>
                       <div><ul><li><a href="proplist1.php?u=<?php echo $_GET['u']?>">Search By Type</a></li><li><a href="proplist2.php?u=<?php echo $_GET['u']?>">Search By Description</a></li><li><a href="proplist3.php?u=<?php echo $_GET['u']?>">Search By Address</a></li></div>
			<table class="nmtable" >
				<tr id="darkHead">
					<td> Type </td><td> Property Description </td><td> Address </td><td> Picture </td><td> Evidence </td><td> Update </td><td> Delete </td>
				</tr>
				<?php 
					if(isset($_GET['u']))
						$h = $_GET['u'];
					$db = new mysqli('localhost','root','','pmsdemo');
					if(!isset($_GET['search'])){
					$ros = $db->query("select* from properties where owner='$h'");
					foreach ($ros as $ro) {?>
						<tr><td>
						<?php
						$tk = $ro['propertyId'];
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
						if(strlen($ro['address']) != 0){
							$n = $ro['address'];
							echo $n;
						}?><td/>
						<?php
						if(strlen($ro['propimg']) != 0){
							$n = $ro['propimg'].'.png';
							echo "<a href='$n' target='_blank'>".$n."</a>";
						}?><td/>
						<?php
						if(strlen($ro['evidence']) != 0){
							$n = $ro['evidence'].'.png';
							echo "<a href='$n' target='_blank'>".$n."</a>";
						}?><td/>
						<a href='pupdate.php?u=<?php echo $tk?>&us=<?php echo $h?>'>update</a></td>
						<td><a href='proplist.php?d=<?php echo $tk?>&u=<?php echo $h?>'>delete</a></td>
						</tr>
					<?php };}?>
				<?php 
					if(isset($_GET['search'])){
					$search = $_GET['search'];
					echo "<script> hide.value = '$search'</script>";
					$ros = $db->query("select* from properties where owner='$h' and propertydescription like '%$search%' or owner='$h' and address like '%$search%' or owner='$h' and proptype like '%$search%'");
					foreach ($ros as $ro) {?>
						<tr><td>
						<?php
						$tk = $ro['propertyId'];
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
						if(strlen($ro['address']) != 0){
							$n = $ro['address'];
							echo $n;
						}?><td/>
						<?php
						if(strlen($ro['propimg']) != 0){
							$n = $ro['propimg'].'.png';
							echo "<a href='$n' target='_blank'>".$n."</a>";
						}?><td/>
						<?php
						if(strlen($ro['evidence']) != 0){
							$n = $ro['evidence'].'.png';
							echo "<a href='$n' target='_blank'>".$n."</a>";
						}?><td/>
						<a href='pupdate.php?u=<?php echo $tk?>&us=<?php echo $h?>'>update</a></td>
						<td><a href='proplist.php?d=<?php echo $tk?>&u=<?php echo $h?>'>delete</a></td>
						</tr>
					<?php };}?>
			</table>
			
			<?php }
				else
					echo "<a style='font-weight:bold;font-size:900%;color:red;background:pink;margin:60px' href='login.php'>Click to Continue</a><br/>";
				?>
			