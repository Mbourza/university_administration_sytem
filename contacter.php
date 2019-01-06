<?php 

require_once('core/init.php');
if(Input::exists()){

	$user = new User();
	$db = DB::getInstance();

    if(Token::check(Input::get('token'))){

    	$email    = Input::get('email');
    	$mg_title = Input::get('mssg_title');
    	$mssage   = Input::get('mssg_txt');
    	$id_prof  = $user->data()->id;
    	$class = array();
    	$date = date('Y-m-d H:i:s');
    	$slect = Input::get('sent_all');

        $validate   = new Validate();
	    $validation = $validate->check($_POST, array(

		    'mssg_title' => array('required' => true),
		    'mssg_txt' => array('required' => true)

		    ));

	    if($validation->passed()){
	    	if($slect == 2){

	    		$member = DB::getInstance()->get('members', array('memb_email', '=', $email));

	    		if($member->count()){

		    		$id = $member->first()->id;

		    		$sent = DB::getInstance()->insert('messages', array(

		    			'sento_id' => $id,
		    			'sentf_id' => $id_prof,
		    			'title' => $mg_title,
		    			'mssg' => $mssage,
		    			'date' => $date
		    		));

		    		if($sent){

		    			echo 'your Mssage Was sent !!';
		    		}
		    	}

	    	} else {

	        	$members = DB::getInstance()->get('members', array('memb_group', '=', 1));

	        	if($members->count()){

	        		for($i = 0; $i < $members->count(); $i++ ){

	        			$class[] = $members->firsts($i)->id;
	        	    }

	        	    foreach($class as $id){

		        	    $sent = DB::getInstance()->insert('messages', array(

			    			'sento_id' => $id,
			    			'sentf_id' => $id_prof,
			    			'title' => $mg_title,
			    			'mssg' => $mssage,
			    			'date' => $date
		    			));

	        	    }
	        	}
	        }
	        
	    } else{

		    print_r($validation->errors());
	    }
    }
}

?>
<style>

#forum {
	
	width: 60%;
	margin: 3em auto 1em;
}

#selstate {

	margin: 1em auto;
}

#email {

	margin: 1em auto;
	display: none;
}

#mg-tit {

	margin: 1em auto;
}

#mg-txt{

	margin:1em auto;
	resize: none;
	height: 10em;
}
</style>
<form id="forum"  action="" method="post">
<h3>Sent Message...</h3>
	<select class="form-control" name="sent_all" id="selstate" onchange="hidSho();">
		<option value="1">To All Class</option>
		<option value="2">To An Etudiant</option>	
	</select>

	<input class="form-control" type="email" name="email" id="email" placeholder="Entre The Email Of Etudiant u Want To Contact..." >
	<input class="form-control" type="text" name="mssg_title" id="mg-tit" placeholder="Entre The Mssage Title...">
	<textarea class="form-control" name="mssg_txt" id="mg-txt"></textarea>
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	<input class="btn btn-default" type="submit" value="Send Mssg" id="se_sent">
</form>

<script>
	
function hidSho(){

	var p = document.getElementById('selstate').value;
	var c = document.getElementById('email');

	if(p == 1){

		c.style.display = 'none';

	} else{

		c.style.display = 'block';
	}
}

</script>