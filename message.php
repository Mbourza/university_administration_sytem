<?php

require_once('core/init.php');

$db = DB::getInstance();

$user = new User();

$id = $user->data()->id;

$messages = $db->getMssgs($id);

?>

<style>

#boxed{
	
	width:60%;
	margin:4em auto;
	background:white;
	border:1px solid #313131;
	padding:.5em;
	border-radius:9px;
}
.mssg-box{

	width:90%;
	margin:.4em;
	border-radius:6px;
	padding:.2em;
	border:1px solid #313131;
}
.mssg-box > h3{

	color:#313131;
}
.mssg-box > h3 > a{
	
	font-family:cursive;
	padding-left:.6em;
	font-size:.9em;
	color:#313131;
}
.mssg-box > p{

	width:90%;
	margin:.2em auto;
	font-family:cursive;
	font-size:.8em;
	display:none;
}
.infoDo{

	float:right;
}
.infoDo > a {

	font-family:sans-serif;
	font-style:italic;
	color: #232323;
	font-size:.8em;
	margin: 0 .3em;
}

</style>

<div id="boxed">

	<?php if(!empty($messages)) { foreach($messages as $index=>$message){?>

	<div class="mssg-box">
		
		<h3><?php echo $index+1; ?>)<a href="#"><?php echo $message->title; ?></a>
			<div class="infoDo"><a href="delmssg.php?id=<?php echo $message->id; ?>">Delete</a></div></h3>
		
		<p><?php echo $message->mssg; ?></p>

	</div>
	<?php } }else{ ?>

	<p>There Is No Messages for now !!</p>

	<?php } ?>
</div>

<script>

$(document).ready(function(){

	$('.mssg-box > h3').click(function(){

		$('.mssg-box p').hide("slow");
		$(this).next('p').slideToggle();

	});

});	
</script>

