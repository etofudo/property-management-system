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

       <form action="adminllist.php" method="post">
                <?php include('search.php');?>
       </form>
	<?php 
               include('ldelete.php');
        ?>


<table class="nmtable" >
	<tr id="darkHead">
		<td> Id </td><td> FirstNames </td><td> LastName </td><td> Gender </td><td> Username </td><td> Regdate </td><td> Picture </td><td> Update </td><td> Delete </td>
	</tr>
	<?php 
		$db = new mysqli('localhost','root','','pmsdemo');
                if(!isset($_POST['search'])){
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
			if(strlen($ro['gender']) != 0){
				$n = $ro['gender'];
				echo $n;
			}?><td/>
			<?php
			if(strlen($ro['username']) != 0){
				$n = $ro['username'];
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
	<?php };}?>
<?php 
		
                if(isset($_POST['search'])){
                $search = $_POST['search'];
                echo "<script> hide.value = '$search'</script>";
                /*$query = 'SELECT * FROM pmsadmin WHERE fname like "%:search%"';
                $statement = $con->prepare($query);
                $statement->bindValue('search', '$search');
                $statement->execute();
		$ros = $statement->fetchAll();*/
                $ros = $db->query("select* from landlords2 where fname like '%$search%' or lname like '%$search%' or username like '%$search%'");
                if(!empty($ros)){
		foreach ($ros as $ro) {?>
			<tr><td>
			<?php
			$tk = $ro['lanlordId'];
			if(strlen($ro['lanlordId']) != 0){
				$n = $ro['lanlordId'];
				echo $n;
			}?><td/>
			<?php
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
			if(strlen($ro['gender']) != 0){
				$n = $ro['gender'];
				echo $n;
			}?><td/>
			<?php
			if(strlen($ro['username']) != 0){
				$n = $ro['username'];
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
	<?php };}}
         
                  
?>

</table>

	