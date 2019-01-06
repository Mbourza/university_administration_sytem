<?php 

$user = new User();

?>

	<div class="sidebar col-sm-3">

		<ul class="nav side-nav">

			<?php if($user->data()->memb_group == 1) { ?>

			<li><a href="pro.php?page=home"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="pro.php?page=message"><img src="" alt="">your messages</a></li>
			<li><a href="pro.php?page=emploi"><img src="" alt="">Emploi de Temp</a></li>
			<li><a href="pro.php?page=gstade"><img src="" alt="">Gestion De Satge</a></li>
			<li><a href="pro.php?page=demandCarte"><img src="" alt="">Demander Carte D'etudiant </a></li>
			<li><a href="pro.php?page=logout"><img src="" alt=""><i class="fa fa-sign-out"></i> Log Out</a></li>

			<?php } else if($user->data()->memb_group == 2) { ?> 

			<li><a href="pro.php?page=home"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="pro.php?page=pEmp"><img src="" alt="">Emploi De Temps</a></li>
			<li><a href="pro.php?page=emploi"><img src="" alt="">Emplois De Temp du Class</a></li>
			<li><a href="pro.php?page=listes"><img src="" alt="">Liste D'etudiant</a></li>
			<li><a href="pro.php?page=absence"><img src="" alt="">Saiser d'absence</a></li>
			<li><a href="pro.php?page=contacter"><img src="" alt="">Contacter An Etudiant</a></li>
			<li><a href="pro.php?page=statistique"><img src="" alt="">Statiques</a></li>
			<li><a href="pro.php?page=logout"><img src="" alt=""><i class="fa fa-sign-out"></i> Log Out</a></li>

			<?php } else { ?>

			<li><a href="pro.php?page=home"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="pro.php?page=crate_Emploi"><i class="fa fa-calendar"></i> Crate An Emploi De Temps</a></li>
			<li><a href="javascript:;" data-toggle="collapse" data-target="#etudi"><i class="fa fa-user-plus"></i> Etudiants</a>

				<ul class="collapse" id="etudi">
					<li><a href="pro.php?page=viewE">View Etudiants</a></li>
					<li><a href="pro.php?page=addE">Add Etudiant</a></li>
				</ul>
			</li>
			<li><a href="javascript:;" data-toggle="collapse" data-target="#enseig"><i class="fa fa-users"></i> Enseignements</a>


				<ul class="collapse" id="enseig">
					<li><a href="pro.php?page=viewP">View Enseignements</a></li>
					<li><a href="pro.php?page=addP">Add Enseignement</a></li>
				</ul>
				
			</li>
			<li><a href="javascript:;" data-toggle="collapse" data-target="#secure"><i class="fa fa-user-secret"></i> Security</a>


				<ul class="collapse" id="secure">
					<li><a href="pro.php?page=viewS">View Securitys</a></li>
					<li><a href="pro.php?page=addS">Add Security</a></li>
				</ul>
				
			</li>
			<li><a href="pro.php?page=listes"><i class="fa fa-list-alt"></i> Gere Notes</a></li>
			<li><a href="pro.php?page=parametr"><i class="fa fa-wrench"></i> Parameter</a></li>
			<li><a href="pro.php?page=statistique"><i class="fa fa-bar-chart"></i> Statiques</a></li>
			<li><a href="pro.php?page=logout"><img src="" alt=""><i class="fa fa-sign-out"></i> Log Out</a></li>

			<?php } ?>
		</ul>
	</div>
