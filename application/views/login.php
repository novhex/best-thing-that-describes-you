<?php
if(isset($user_profile)){

	$this->session->set_userdata('current_user',$user_profile['name']);
	$this->session->set_userdata('dp',$user_profile['id']);
	redirect(base_url('/'));
}else{
?>

<a href="<?= $login_url; ?>"> Login with Facebook </a>

<?php }?>