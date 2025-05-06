<?php 
	include('db.php');
	$sql = "select count(*) from landlords2 where fname like '%o'";
		$ros = $con->query($sql);
	if($ros){
		foreach ($ros as $ro){
			echo $ro['count(*)'];
		}
	}
	else{
		echo "Error ".$sql."<hr/>".$con->error;
	}
?>