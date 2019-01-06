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
			    )
		    ));


	    if($validation->passed()){

		    $user = new Security();
		    $salt = Hash::salt(32);

		    try{

		    	$user->create(array(

		    		'name'     => Input::get('name'),
		    		'last'  => Input::get('lname'),
		    		'gender'   => Input::get('gender')

		    		));

		    }catch(Exception $e){

		    	die($e->getMessage());
		    }

	    }else{

		    print_r($validation->errors());
	    }

	    $tm_img = $_FILES['avatar']['tmp_name'];
	    $img = $_FILES['avatar']['name'];
	    move_uploaded_file($tm_img, "users/".$img);
	}
}

?>

<form action="" method="post" enctype="multipart/form-data" id="addEtud">
	
	<div class="field">
		<input type="text" class="form-control" name="name" placeholder="security Name here..."/>
	</div>

	<div class="field">
	    <input type="text" class="form-control" name="lname" placeholder="security Last Name here..."/>
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
