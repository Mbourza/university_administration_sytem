<?php 

require_once('core/init.php');

$user = new User();



?>

<style>
	
#profile_header{

	width:100%;
	height:14em;
}

#cover{

	width:100%;
	height:100%;
	border:2px solid white;
}
#cover > img{

	width:100%;
	height:100%;
}
#pro_pic{

	max-width:20%;
	height:8em;
	margin:-4em 0 0 2em;
	border:1px solid white;
}
#pro_pic > img {

	width:100%;
	height: 100%;
}

#pro_body{

	width:80%;
	margin:6em auto 1em;
	padding:.5em;
	background: white;
	border-radius:10px;
	box-shadow:1px -1px 1px #ccc;
}
.p-profile{

	width:96%;
	border-radius:10px;
	background-color:#212121;
	padding:.5em;
	margin:.2em;
	color:#ccc;
	font-family:cursive;
}
.p-profile > a{

	margin: 0 0 0 3em;
	color:white;
	font-family:sans-serif;
	font-style:italic;
}
</style>

<div id="profile_header">
	<div id="cover"><img src="users/images/cover.jpg" alt=""></div>
	<div id="pro_pic"><img src="users/<?php echo $user->data()->memb_nom; ?>/<?php echo $user->data()->memb_pic;?>" alt=""></div>
</div>
<div id="pro_body">

	<p class="p-profile">Name : <?php echo $user->data()->memb_nom.' '.$user->data()->memb_prenom; ?><a href="#">modifier</a></p>

	<p class="p-profile">Code National : <?php echo $user->data()->memb_code; ?><a href="#">modifier</a></p>

	<p class="p-profile">Email : <?php echo $user->data()->memb_email; ?><a href="#">modifier</a></p>

	<p class="p-profile">Date : <?php echo $user->data()->memb_dNaissance; ?><a href="#">modifier</a></p>

	<p class="p-profile">Password : <?php echo '***********'; ?><a href="#">modifier</a></p>

</div>