<style>
	input{
		display:inline;
	}
				
	input{
		border:none;
		outline-style:none;
	}
	.fixed-div{
		top:0;
		position:fixed;
		width:100%;
		border-bottom:1px solid #441;
		padding:6px 3px 20px 3px;
		z-index:4;
		background:#ddf;
	}
	input[type=text]{
		margin-left:100px;
		width:600px;
		height:45px;
		font-size:20px;
		padding-left:13px;
		/*border:1px solid blue;*/
		box-shadow:5px 5px 5px 0px #bbb;
	}
	#ssh{
		display:inline;
		border:none;
		outline-style:none;
		margin-top:0;
		width:100px;
		height:45px;
		font-size:20px;
		vertical-align:top;
		background:#263;
		color:white;
		cursor:pointer;
		box-shadow:5px 5px 4px 0px #bbb;
	}
	#vale{

		z-index:1;
	}
	#dale{
		z-index:1;
	}
</style>
<div class="fixed-div" style="height:35px">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="hide" name="search1" style="margin-left:80px" type="text"/><button id="ssh"  style="background:#285386;"  tabindex='2'">Search</button>
</div>
<?php
	
?>