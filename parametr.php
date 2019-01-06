<?php

require_once 'core/init.php';

$db = DB::getInstance();

$title = $db->get("regg", array("id", "=", "1"))->first();

$prof = $db->getAll($group = 2);

if(Input::exists()) {

	$stitle = Input::get('title');
	$logo = $_FILES['logo']['name'];
	$newlogo = $_FILES['logo']['tmp_name'];
	$newAdmin = Input::get('admin');

	$chang = $db->update('regg', '1', array(

		"site_title" => $stitle,
		"site_logo"  => $logo

		));

	move_uploaded_file($newlogo, 'template/img/'.$logo);

	if($chang){

		echo '<script>alert("information Modified");</script>';

	}


}

?>

<style>

#para-chg {

	width:60%;
	margin:4em auto 0;
}	

#para-chg  h3 {

	font-family:cursive;
	font-weight:300;
}

#title {

	width:60%;
	height:2em;
	background :none;
	border:none;
	margin:.8em 0;
	border-bottom: 1px solid #212121;
	font-size: 1em;
	font-family:'Indie Flower', cursive;
	text-indent: .4em;
}
#input::-webkit-file-upload-button {

    visibility: hidden;
    background-color: none;
}
#input::before {
    
    width:35%;
    height:2em;
    line-height:2em;
    float: left;
    padding: 0 .2em;
    content: 'Chose an img';
    display: inline-block;
    background: white;
    color: #262626;
    border:1px solid #212121;
    border-radius: 5px;
    cursor: pointer;
}

.chg-btn {

	width:30%;
	height:2.5em;
	color:white;
	border:none;
	border-radius: 4px;
	margin: 1.5em auto 0;
	background-color: #212121;
}

#m-admin {

	width:60%;
	height:2em;
	background :none;
	border:none;
	margin:.8em 0;
	border-bottom: 1px solid #212121;
	font-size: 1em;
	font-family:'Indie Flower', cursive;
	text-indent: .4em;
}

</style>

<div id="para-chg">

	<form action="" method="post" enctype="multipart/form-data" id="form">
		
		<h3>Website Title : <small><?php echo $title->site_title; ?></small></h3>
		<input type="text" name="title" id="title" value="<?php echo $title->site_title; ?>">

		<h3>Website logo : <img src="template/img/<?php echo $title->site_logo; ?>" alt="" width="100"></h3><br />
		<input type="file" name="logo" id="input">
		
		<h3>Add Admin</h3>

		<select name="admin" id="m-admin">
			<?php foreach($prof as $p) { ?>

			<option value="<?php echo $p->memb_nom.' '.$p->memb_prenom; ?>"><?php echo $p->memb_nom.' '.$p->memb_prenom; ?></option>

			<?php } ?></select><br />

			<input type="submit" value="Submit" class="chg-btn">
		</select>

	</form>
</div>
<script>

$("#form").submit(function(){

	window.location.reload();
});	

</script>