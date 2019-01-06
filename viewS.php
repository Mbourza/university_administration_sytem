<?php 

$user = new User();

$db = DB::getInstance();

if(!Session::exists(Config::get('session/session_name'))){

    Redirect::to('login.php');
}

if($user->data()->memb_group == 1 && $user->data()->memb_group == 2){

	Redirect::to('includes/error/denied.php');

} else{

	$securitys = $db->getTable('securitys');
	
	if(isset($_POST['submit'])) {

		$values[] = Input::get('secure');

		foreach($values as $value) {

			foreach($value as $id){

				$db->delete("securitys", array("id", "=", $id));
			}
		}
		Redirect::to('pro.php?page=viewS');
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
			
		<?php if(empty($securitys)){ ?>

			<p>There Is No Security Right Now !!</p>

		<?php } else { ?>

			<table class="table table-hover">
			<h3 class="thead">Securitys</h3>
				<tr>
					<td></td>
					<td>numero</td>
					<td>Security nom</td>
					<td>Security prenom</td>
				</tr>
				<?php foreach ($securitys as $index=>$secure) { ?>
				<tr class="tr">
				    <td><input type="checkbox" name="secure[]" value="<?php echo $secure->id; ?>"></td>
					<td><?php echo $index+1; ?></td>
					<td><?php echo $secure->name; ?></td>
					<td><?php echo $secure->last; ?></td>
				</tr>
				<?php } ?>
				
			</table>

		<?php } ?>
	</form>
</div>
<?php } ?>