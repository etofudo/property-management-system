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
                       <form action="adminplist.php" method="post">
                                     <?php include('search.php');?>
                         </form>

			<?php
					if(isset($_GET['d'])){
						$id = $_GET['d'];
						include('db.php');
						$sql = "DELETE FROM properties WHERE propertyId = $id;";
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
								if($con->query($sql) === TRUE){
									echo "Records deleted succesfully";
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
				?>
			<?php session_start();if(true){?>
			<table class="nmtable" >
				<tr id="darkHead">
					<td> ID </td><td> Type </td><td> Property Description </td><td> Owner </td><td> Address </td><td> Picture </td><td> Evidence </td><td> Update </td><td> Delete </td>
				</tr>
				<?php 
					if(isset($_GET['u']))
						$h = $_GET['u'];
					include('db.php');
                                        if(!isset($_POST['search'])){
					$ros = $con->query("select* from properties");
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
						}?><td/>
						<?php
						$rows = $con->query("select fname,lname,owner from properties,landlords2 where owner = lanlordId and propertyId='$tk'");
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
						<?php
						if(strlen($ro['evidence']) != 0){
							$n = $ro['evidence'].'.png';
							echo "<a href='$n' target='_blank'>".$n."</a>";
						}?><td/>
						<a href='adminpupdate.php?u=<?php echo $tk?>'>update</a></td>
						<td><a href='adminplist.php?d=<?php echo $tk?>'>delete</a></td>
						</tr>
				<?php };}?><?php 
		
                if(isset($_POST['search'])){
                $search = $_POST['search'];
                echo "<script> hide.value = '$search'</script>";
                /*$query = 'SELECT * FROM pmsadmin WHERE fname like "%:search%"';
                $statement = $con->prepare($query);
                $statement->bindValue('search', '$search');
                $statement->execute();
		$ros = $statement->fetchAll();*/
                $ros = $con->query("select* from properties where proptype like '%$search%' or propertydescription like '%$search%' or owner like '%$search%'");
                if(!empty($ros)){
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
						}?><td/>
						<?php
						$rows = $con->query("select fname,lname,owner from properties,landlords2 where owner = lanlordId and propertyId='$tk'");
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
						<?php
						if(strlen($ro['evidence']) != 0){
							$n = $ro['evidence'].'.png';
							echo "<a href='$n' target='_blank'>".$n."</a>";
						}?><td/>
						<a href='adminpupdate.php?u=<?php echo $tk?>'>update</a></td>
						<td><a href='adminplist.php?d=<?php echo $tk?>'>delete</a></td>
			</tr>
	<?php };}}
         
                  
?>

</table>
			
			<?php }
				else
					echo "<a style='font-weight:bold;font-size:900%;color:red;background:pink;margin:60px' href='login.php'>Click to Continue</a><br/>";
				?>
	