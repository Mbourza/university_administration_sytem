<?php

require_once('core/init.php');

$memb = new User();

if(!Session::exists(Config::get('session/session_name'))) {

    Redirect::to('lg.php');
}

?>

<?php require_once('template/header.php'); ?>

<?php require_once('template/side.php'); ?>
<div id="content" class="col-sm-9">
<?php

$page = escape(@$_GET['page']);

if(empty($page)) {

	$page = 'home';
} 

	switch($page){

		case 'home':
			require_once('home.php');
			break;

		case 'crate_Emploi':
			require_once('emploiTemp.php');
			break;
		case 'emploi':
			require_once('emploi.php');
			break;
		case 'pEmp':
			require_once('proEmps.php');
			break;
		case 'peml':
			require_once('proEmp.php');
			break;
		case 'addE':
			require_once('addEtud.php');
			break;
		case 'addP':
			require_once('addProf.php');
			break;
		case 'addS':
			require_once('secure.php');
			break;
		case 'viewP':
			require_once('viewP.php');
			break;
		case 'absence':
			require_once('absence.php');
			break;
		case 'viewE':
			require_once('viewEtud.php');
			break;
		case 'viewS':
			require_once('viewS.php');
			break;
		case 'listes':
			require_once('liste.php');
			break;
		case 'contacter':
			require_once('contacter.php');
			break;
		case 'message':
			require_once('message.php');
			break;
		case 'statistique':
			require_once('static.php');
			break;
		case 'parametr':
			require_once('parametr.php');
			break;
		case 'logout':
			require_once('lgt.php');
			break;

		default :
		    require_once'includes/error/404.php';
		    break;
	}
?>

</div>
<?php require_once('template/footer.php'); ?>