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

	$id = $user->data()->id;
	$temp = new Temp();
	$jour = array("lundi","mardi","mercredi","jeudi","vendredi","samedi");
	for($j = 0; $j<6 ; $j++){


	    $temp->create("pro_emploi", array(

	    	'pro_id'=> $id,
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
	width:10%;
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
	

	<table class="table table-bordered">
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
					<td><input value="work" type="radio" class="inpCla" name="<?php echo $jour[$i] ?>_val1"></td>
					<td><input value="work" type="radio" class="inpCla" name="<?php echo $jour[$i] ?>_val2"></td>
		    		<td><input value="work" type="radio" class="inpCla" name="<?php echo $jour[$i] ?>_val3"></td>
					<td><input value="work" type="radio" class="inpCla" name="<?php echo $jour[$i] ?>_val4"></td
				</tr>
	    <?php }?>
	    
    </table>

    <input id="tmp-sub" type="submit" value="Valider">
</form>

<?php } ?>