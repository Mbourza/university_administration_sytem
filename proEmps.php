<?php 

require_once 'core/init.php';

$db = new PDO('mysql:host=localhost;dbname=gdn', 'root', '');
$temp = $db->query("SELECT * FROM pro_emploi");
while($row = $temp->fetchObject()){

	$temps[] = $row;
}

?>

<style>
	
table tr td {

	font-size: 1.4em;
}

</style>

<?php if(!empty($temps)){ ?>

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

	            foreach($temps as $temp){
	    		 ?>
					
				<tr>
					<td><?php echo $temp->jour; ?></td>
					<td><?php echo $temp->val1; ?></td>
					<td><?php echo $temp->val2; ?></td>
		    		<td><?php echo $temp->val3; ?></td>
					<td><?php echo $temp->val4; ?></td
				</tr>
	    <?php }?>
	    
    </table>
<?php } else { ?>

<p>There is No Emploi Right Now..</p>
<?php } ?>