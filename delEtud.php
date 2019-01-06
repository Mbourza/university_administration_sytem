<?php 

require_once('core/init.php');

	$user = new User();

    if(!Session::exists(Config::get('session/session_name'))){

	    Redirect::to('login.php');

	    if($user->data()->memb_group == 1 or $user->data()->memb_group == 2){

		    Redirect::to('includes/error/denied.php');
	}
	
} else {

	if(isset($_GET['values'])) {

		print_r($_GET['values']);
	}
}
	
?>

