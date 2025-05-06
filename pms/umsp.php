		<header>
		<div id="brand"><a href='/pms'><image src="anchor_logo.png" width="260px" heigth="120px" style="float:left;position:relative;bottom:20px;left:40px;"/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PROPERTY &nbsp;&nbsp;MANAGER</div>
		<div id="navi">
			<ul class="righty">
				<li><a href="contact.php">Contact</a></li>
				<li><a href="/pms">Log Out</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="index.php">Home</a></li>
			</ul>
		</div>
		
		</header>
		<div class="side-nav" style="width:16%">
			<div style="border-radius:50%;width:200px;height:200px;overflow:hidden;margin-left:6px;margin-right:0px
			;background:white"
			><image id="ima" src="<?php 
					include('db.php');
					$h = $_GET['us'];
					$ros = $con->query("select img from landlords2 where lanlordId=$h");
					foreach ($ros as $ro) {
						if(strlen($ro['img']) != 0){
							$n = $ro['img'].'.png';
							echo $n;
						}
					};?>" style="position:relative;display:none"/>
			</div>	
			<li><a href="profile.php?u=<?php echo $h?>">Profile</a></li>
			<li><a href="/pms">Log Out</a></li>
			<li><a href="propreg.php?u=<?php echo $_GET['us'];?>">Register Property</a></li>
			<li><a href="proplist.php?u=<?php echo $_GET['us'];?>">Property List</a></li>
		</div>
		<script>
			window.onload = function(){
				c = ima.naturalHeight/ima.naturalWidth;
				console.log(c);
				if(c < .99){
					ima.width = '200';
					d = ima.height = c*'200';
					z = 0.5*(200 - d);
					ima.style.top = z + 'px';
					console.log(z, ima.style.top);
					ima.style.display = 'block';
				}
				else if(c > 1.01){
					ima.height = '200';
					c = 1/c;
					d = ima.width = c*'200';
					z = 0.5*(200 - d);
					ima.style.left = z + 'px';
					console.log(z, ima.style.left);
					ima.style.display = 'block';
				}
				else if(.99 <= c <= 1.01){
					ima.height = '200';
					ima.style.display = 'block';
				}
			};
		</script>