<?php 

session_start();

$GLOBALS['config'] = array(

	'mysql' => array(

		'host' => '127.0.0.1',
		'user' => 'root',
		'pass' => '',
		'db'   => 'gdn' 
		),
    
    'remember' => array(

    	'cookie_name' => 'hash',
    	'cookie_expiry' => 604800

    	),

	'session' => array(

		'session_name' => 'user',
		'token_name' => ''
		
		)
	);

spl_autoload_register(function($class){

	require_once('classes/'. $class .'.php');
});

require_once ('functions/escape.php');

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {

	$hash = Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get('sessions', array('hash', '=', $hash));

	if($hashCheck->count()) {
	    $user = new User($hashCheck->first()->memb_id);
		$user->login();
	}
}

?>