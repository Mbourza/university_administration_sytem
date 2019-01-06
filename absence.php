<?php 

require_once('core/init.php');

$user = new User();

    if(!Session::exists(Config::get('session/session_name'))){

	    Redirect::to('login.php');
	}

	else if(!$user->data()->memb_group == 2){

		Redirect::to('includes/error/denied.php');
	
    } else{

?>

<?php

$etuds = DB::getInstance()->getAll($g = 1);
$number = array_sum($etuds);
if(Input::exists()){

	
	

}

?>

<form class="form-group" action="" method="post"></form>
	
<?php } ?>
	
	
	