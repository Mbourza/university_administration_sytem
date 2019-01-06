<?php 

require_once('core/init.php');

	$user = new User();

    if(!Session::exists(Config::get('session/session_name'))){

	    Redirect::to('login.php');

	    if($user->data()->memb_group == 1 && $user->data()->memb_group == 2){

		    Redirect::to('includes/error/denied.php');
	}
} else{

?>

<?php

if(Input::exists()){

	$temp = new Temp();
	$jour = array("lundi","mardi","mercredi","jeudi","vendredi","samedi");
	for($j = 0; $j<6 ; $j++){


	    $temp->create("temps", array(

	    	'jour' => Input::get('jour'.$j),
	    	'val1' => Input::get( $jour[$j].'_val1'),
	    	'val2' => Input::get( $jour[$j].'_val2'),
	    	'val3' => Input::get( $jour[$j].'_val3'),
	    	'val4' => Input::get( $jour[$j].'_val4')
	    ));
	}
}

?>

<style>

table tr td {

	font-size: 1.2em;
}

table tr td > input {

	border:none;
	width:60%;
	height:3em;
	text-indent: 1em;
}	
#tmp-sub {

	width: 20%;
	height: 3em;
	border: none;
	background-color: #262626;
	color: white;
}
</style>

<form action="" method="post" id="temp-form">
	

	<table class="table table-hover">
	    <tr>
		    <td>Jours / Sesance</td>
		    <td>8:00 <i class="fa fa-long-arrow-right"></i> 10:00</i></td>
		    <td>10:00 <i class="fa fa-long-arrow-right"> 12:00</td>
		    <td>14::00 <i class="fa fa-long-arrow-right"> 16:00</td>
		    <td>16:00 <i class="fa fa-long-arrow-right"> 18:00</td>
	    </tr>
	    <?php

	    $jour = array("lundi","mardi","mercredi","jeudi","vendredi","samedi");
	    		for($i = 0; $i<6; $i++) { ?>
					
				<tr>
					<td><?php echo $jour[$i] ?><input type="hidden" name="jour<?php echo $i; ?>" value="<?php echo $jour[$i]; ?>"/></td>
					<td><input type="text" class="inpCla" name="<?php echo $jour[$i] ?>_val1" class="tem-input" placeholder="Enter Data Here..."></td>
					<td><input type="text" class="inpCla" name="<?php echo $jour[$i] ?>_val2" class="tem-input" placeholder="Enter Data Here..."></td>
		    		<td><input type="text" class="inpCla" name="<?php echo $jour[$i] ?>_val3" class="tem-input" placeholder="Enter Data Here..."></td>
					<td><input type="text" class="inpCla" name="<?php echo $jour[$i] ?>_val4" class="tem-input" placeholder="Enter Data Here..."></td
				</tr>
	    <?php }?>
	    
    </table>

    <input id="tmp-sub" type="submit" value="Valider">
</form>

<?php } ?>