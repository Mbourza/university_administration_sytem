<?php 

require_once ('core/init.php');

if(!Session::exists(Config::get('session/session_name'))) {

	Redirect::to('login.php');

}
	
	
?>