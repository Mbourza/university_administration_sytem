<?php 

require_once('core/init.php');

$db = DB::getInstance();

if(isset($_GET['id'])) {

	$id = $_GET['id'];

	$del = $db->delete('messages', array('id', '=', $id));

	if($del){

		Redirect::to('profile.php?page=message');
	}
}

?>