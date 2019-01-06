<?php 

$db = DB::getInstance();

$lists = DB::getInstance()->getAll(1);

$etud = count($lists);

$ensg = count(DB::getInstance()->getAll(2));

$admin = count(DB::getInstance()->getAll(3));

?>
<style>

#static {

	width: 60%;
	margin: 4em auto 0;
	background-color: #0f2c27;
	padding: .5em;
}
#static > h3{

	color: white;
	font-family: cursive;
	font-weight: 300;
	line-height: 2em;
}
</style>
<div id="static">	
	<h3>Nombre D'Etudiants: <?php echo $etud; ?></h3>
	<h3>Nombre D'Ensiengements: <?php echo $ensg; ?></h3>
	<h3>Nombre Admin: <?php echo $admin; ?></h3>
</div>