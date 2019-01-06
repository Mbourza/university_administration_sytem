<?php 

$user = new User();
$db = DB::getInstance();

if(!Session::exists(Config::get('session/session_name'))){

    Redirect::to('login.php');
}

if($user->data()->memb_group == 1){

	Redirect::to('includes/error/denied.php');

} else{

	$group = 1;
	$lists = DB::getInstance()->getAll($group);

	if(isset($_POST['submit'])) {

		$values[] = Input::get('etud');

		foreach($values as $value) {

			foreach($value as $id){

				$db->delete("members", array("id", "=", $id));
			}
		}
		Redirect::to('pro.php?page=viewE');
	}

?>

<style>

table td {

	font-size: 1.6em;
}

.thead {

	font-family: cursive;
	font-style: italic;
}

#chBtn {

	height:1em;
	line-height: .5em;
}

.panel{

	text-align: left;
}

</style>
<div id="lists">
	<form action="" method="post">
		<div class="panel">
			<button href="" type="button" class="btn btn-primary">Go Back</button>
			<button name="submit" type="submit" class="btn btn-danger">Delete</button>
		</div>
			
		<?php if(empty($lists)){ ?>

			<p>There Is No Etudiant Right Now !!</p>

		<?php } else { ?>

			<table class="table table-hover">
			<h3 class="thead">Liste Des Etudiants</h3>
				<tr>
					<td></td>
					<td>numero</td>
					<td>Etudiant nom</td>
					<td>Etudiant prenom</td>
					<td>Code National</td>
					<td>Contact</td>
					<td>Action</td>

				</tr>
				<?php foreach ($lists as $index=>$etud) { ?>
				<tr class="tr">
				    <td><input type="checkbox" name="etud[]" value="<?php echo $etud->id; ?>"></td>
					<td><?php echo $index+1; ?></td>
					<td><?php echo $etud->memb_nom; ?></td>
					<td><?php echo $etud->memb_prenom; ?></td>
					<td><?php echo $etud->memb_code; ?></td>
					<td><?php echo $etud->memb_email; ?></td>
					<td><button id="chBtn" class="btn btn-default" href=""><i class="fa fa-pencil-square-o"></i></button></td>
				</tr>
				<?php } ?>
				
			</table>

		<?php } ?>
	</form>
</div>
<?php } ?>