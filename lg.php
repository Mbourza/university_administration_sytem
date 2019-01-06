<?php

require('core/init.php');

if(Input::exists()){

    if(Token::check(Input::get('token'))){

	    $validate   = new Validate();
	    $validation = $validate->check($_POST, array(
        
        
            'user' => array('required' => true),
            'pass' => array('required' => true)
        
        ));
        
        if($validation->passed()) {
            
            $user = new User(); 
            $remember = (Input::get('remember') === 'on') ? true : false;   
            $login = $user->login(Input::get('user'), Input::get('pass'), $remember);
            
            if($login){
                
                Redirect::to('pro.php');
            }
            
        } else {
            
            echo "Entere Ur Username And Password To Log In";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php if(Session::exists(Config::get('session/session_name'))) {echo Session::get(Config::get('session/session_name'));}else{?>Gestion Des Notes <?php }?></title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="template/css/bootstrap.css">
	<link rel="stylesheet" href="template/css/theme.css">
	<link rel="stylesheet" href="template/css/style.css">
	<!-- here is the js script -->
	<script src="template/js/jq.js"></script>
	<script src="template/js/bootstrap.js"></script>
</head>
<body>
<div id="over"></div>
<div class="warpp">
	<div class="logIn">
		<div class="col-sm-8 logo"><img src="template/img/logo.png" alt=""></div>
		<form class="form-horizontal" action="" method="post">
			<div class="form-group">
				<div class="col-sm-8">
					<input type="text" class="form-control" id="user" name="user" placeholder="Name">
				</div>
			</div>
			<div class="form-group">

				<div class="col-sm-8">
					<input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-8">
					<div class="checkbox">
						<label>
							<input type="checkbox" id="checkbox" name="remember"> Remember me	
						</label>					
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-8">
					<input type="hidden" name="token" value="<?php echo Token::generate(); ?>" >
					<button type="submit" class="btn btn-default" id="form-btn">Sign in</button>
				</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>