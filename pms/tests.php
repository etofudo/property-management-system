	<table class="nmtable" >
	<tr id="darkHead">
		<td> Id </td><td> FirstNames </td><td> LastName </td><td> Gender </td><td> Username </td><td> Regdate </td><td> Picture </td><td> Delete </td>
	</tr>
<?php 
		$db = new mysqli('localhost','root','','pmsdemo');
		$sql = "select* from general";
		$ros = $db->query($sql);
		foreach ($ros as $ro) {?>
			<tr><td>
			<?php
			if(strlen($ro['noofpsadmin']) != 0){
				$n = $ro['noofpsadmin'];
				echo $n;
			}?><td/>
			<?php
			if(strlen($ro['noofpropev']) != 0){
				$n = $ro['noofpropev'];
				echo $n;
			}?><td/>

	</tr>
	<?php };?>
</table>