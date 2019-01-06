<?php 

require_once('core/init.php');

	$user = new User();

    if(!Session::exists(Config::get('session/session_name'))){

	    Redirect::to('login.php');
	}

	else if($user->data()->memb_group == 1 or $user->data()->memb_group == 2){

		Redirect::to('includes/error/denied.php');
	
    } else{

?>

<?php

if(Input::exists()){

    if(Token::check(Input::get('token'))){

	    $validate   = new Validate();
	    $validation = $validate->check($_POST, array(

		    'name' => array(

			    'required' => true,
			    'min' => 3,
			    'max' => 20 
			    ),
		    'lname' => array(

			    'required' => true,
			    'min' => 3,
			    'max' => 20 
			    ),
		    'memb_code' => array(

			    'required' => true,
			    'unique' => 'members'
			    ),

		    'memb_email' => array(

		    	'unique' => 'members'
		    	)

		    ));

	    if($validation->passed()){

		    $user = new User();
		    $salt = Hash::salt(32);

		    try{

		    	$user->create(array(

		    		'memb_nom'     => Input::get('name'),
		    		'memb_prenom'  => Input::get('lname'),
		    		'memb_email'   => Input::get('memb_email'),
		    		'memb_code'    => Input::get('memb_code'),
		    		'memb_pass'    => Hash::make(Input::get('memb_code'), $salt),
		    		'memb_dNaissance' => Input::get('ddnetud'),
		    		'gender'   => Input::get('gender'),
		    		'memb_group'   => 2,
		    		'memb_salt'    => $salt,
		    		'memb_joinned' => date('Y-m-d'),
		    		'memb_pic' => $_FILES['avatar']['name']
,
		    		));

		    }catch(Exception $e){

		    	die($e->getMessage());
		    }

	    }else{

		    print_r($validation->errors());
	    }

	    $tm_img = $_FILES['avatar']['tmp_name'];
	    $img = $_FILES['avatar']['name'];
	    $floder = Input::get('name');

	    mkdir("users/".$floder, 0700);

	    move_uploaded_file($tm_img, "users/".$floder."/".$img);
	}
}

?>

<form action="" method="post" enctype="multipart/form-data" id="addEtud">
	
	<div class="field">
		<input type="text" class="form-control" name="name" placeholder="Enseignement Name here..." id="numInput"/>
	</div>

	<div class="field">
	    <input type="text" class="form-control" name="lname" placeholder="Enseignement Last Name here..." id="lnumInput"/>
	</div>

	<div class="field">
	   <input type="email" class="form-control" name="memb_email" placeholder="Enseignement Email here..." id="eInput"/>	
	</div>

	<div class="field">
	    <input type="text" class="form-control" name="memb_code" placeholder="Enseignement pass here..." id="coInput"/>	
	</div>

	<div class="field">
	   <input type="text" class="form-control" name="ddnetud" placeholder="Enseignement Date De Naissance here..." id="dnInput"/>
	</div>
	<div class="field">
	   <input type="text" class="form-control" name="matier" placeholder="Enseignement Matier here..." id="matier"/>
	</div>
    <div class="field">
	    <select id="gender" name="gender" class="form-control">
	   		<option>Gender</option>
	        <option value="m">Male</option>
	    	<option value="f">Female</option>
	    </select>
	</div>
	<div class="field">
	    <input type="file" id="fInput" name="avatar" class="form-control"/>
	</div>

	<div class="field">
	    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
        <input type="submit" value="Add Etud" id="sub-btn" class="btn btn-default">
	</div>

</form>
<?php } ?>
