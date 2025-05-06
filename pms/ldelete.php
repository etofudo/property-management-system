<?php
	if(isset($_GET['d'])){
		$id = $_GET['d'];
		include('db.php');
		$sql = "DELETE FROM pmsadmin WHERE adminid = $id;";
		$dos = $con->query("select img from pmsadmin where adminid='$id'");
		foreach ($dos as $do) {
			if(strlen($do['img']) != 0)
				$pim = $do['img'];
		}
		unlink("$pim".'.png');
		if($con->query($sql) === TRUE){
			echo "Record deleted succesfully";
		}
		else{
			echo "Error ".$sql."<hr/>".$con->error;
		}
	}
?>